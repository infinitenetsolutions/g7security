<?php
include("db.php");
include ("session.php");
$count_emp = mysqli_query($conn,"select count(id) as eid FROM emp_data");
$emp_no = mysqli_fetch_array($count_emp);
if(isset($_POST['submit']))
{
    
$emp_number = $emp_no['eid'];
$k = 1;
for (; $k <= $emp_number; $k++)
{
    $emp_id ='emp_id' . $k;
    $wage ='wage' . $k;
    $total ='total_amt' . $k;
   $working = 'working_days' . $k;
    $monthly_wage = 'monthly_wage' . $k;
    $designation='designation_sel'.$k;
    if ($_REQUEST[$working] != '' && !is_null($_REQUEST[$working])) {
        $ins_data= mysqli_query($conn,"INSERT INTO `attendance`(`month`, `company_id`, `emp_id`, `no_of_days`, `wage_perday`,`monthly_wage`,`total_amt`,`designation`) VALUES ('".$_REQUEST['month']."','".$_REQUEST['cname']."','".$_REQUEST[$emp_id]."','".$_REQUEST[$working]."','".$_REQUEST[$wage]."','".$_REQUEST[$monthly_wage]."','".$_REQUEST[$total]."','".$_REQUEST[$designation]."')");
        //var_dump($ins_data);
           
        if($ins_data)
        {
        $sel_c_billing = mysqli_query($conn,"select * from company_bill where company='".$_REQUEST['cname']."' AND month='".$_REQUEST['month']."'");
        $bill_billing = mysqli_fetch_assoc($sel_c_billing);
        if(mysqli_num_rows($sel_c_billing) > 0)
        {
            $bill_ = $bill_billing['id'];
            $sel_databill = mysqli_query($conn,"select * from company_billing where bill_no='".$bill_."'");
            $sel_forbilling = mysqli_query($conn,"select * from attendance where month = '".$_POST['month']."' AND company_id='".$_POST['cname']."' AND designation='".$_REQUEST[$designation]."'");
            while($data_forbilling = mysqli_fetch_assoc($sel_forbilling))
            {
                //var_dump("select COUNT(id) as e_id, sum(no_of_days) as w_days from attendance where designation = '".$data_forbilling['designation']."' AND month = '".$_POST['month']."' AND company_id='".$_POST['cname']."'");
                // var_dump("select COUNT(id) as e_id, sum(no_of_days) as w_days from attendance where designation = '".$data_forbilling['designation']."' AND month = '".$_POST['month']."' AND company_id='".$_POST['cname']."'");
                $res_forbilling = mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(id) as e_id, sum(no_of_days) as w_days from attendance where designation = '".$data_forbilling['designation']."' AND month = '".$_POST['month']."' AND company_id='".$_POST['cname']."'" ));
                $emp_forbilling = $res_forbilling['e_id'];
                $days_forbilling = $res_forbilling['w_days'];
                $select_billing_value = mysqli_fetch_assoc(mysqli_query($conn,"select id,rate,no_of_emp,no_of_days from company_billing where company='".$_POST['cname']."' AND month='".$_POST['month']."' AND designation = '".$data_forbilling['designation']."'"));
                $rate = $select_billing_value['rate'];
//             var_dump("select id,rate,no_of_emp,no_of_days from company_billing where company='".$_POST['cname']."' AND month='".$_POST['month']."' AND designation = '".$data_forbilling['designation']."'");exit;
                $b_id= $select_billing_value['id'];
                //days in month
                //date_default_timezone_set('Asia/Kolkata');
                date_default_timezone_set('GMT');

                $date_get = $_POST['month'];
                $orderdate = explode('-', $date_get);
                $year= $orderdate[0];
                $month = $orderdate[1];
                $total_days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                $rate_perday = $rate/$total_days_in_month;
                $amount= $days_forbilling * $rate_perday;
                $update_billing = mysqli_query($conn, "UPDATE `company_billing` SET `no_of_emp`='".$emp_forbilling."',`no_of_days`='".$days_forbilling."',`amount`='".$amount."', updated_date = now() WHERE id='".$b_id."'");
          if($update_billing)
          {
             $sel_cal = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(amount) as total_amt FROM `company_billing` where bill_no = '".$bill_."'"));
              $total = $sel_cal['total_amt'];
              $payment = $bill_billing['payment'];
//var_dump("SELECT sum(amount) as total_amt FROM `company_billing` where bill_no = '".$bill_."'"); exit;
              $sel_gst = mysqli_fetch_assoc(mysqli_query($conn,"select gstin from company where id='".$_REQUEST['cname']."' "));
              $gst_type = substr($sel_gst['gstin'], 0, 2);
              if($gst_type == 20)
              {
                  $gstin = 'c';
              }
              else
                  {
                  $gstin = 'i';
              }
              if($gstin == 'c')
              {
                  $cgst = $total * .09;
                  $sgst = $total * .09;
                  $igst = 0.00;
                  $net = $cgst + $sgst + $total;
                  $due = $net - $payment;
              }
              else
              {
                  $cgst = 0.00;
                  $sgst = 0.00;
                  $igst = $total * .18;
                  $net = $igst + $total;
                  $due = $net - $payment;
              }
            //  var_dump("SELECT sum(amount) as total_amtu FROM `company_billing` where bill_no = '".$bill_."'");
         //  var_dump("UPDATE `company_bill` SET `total`='".$total."',`net`='".$net."',`due`='".$due."',`cgst`='".$cgst."',`sgst`='".$sgst."',`igst`='".$igst."' where id='".$bill_."'"); exit;
              $update_company_bill = mysqli_query($conn,"UPDATE `company_bill` SET `total`='".$total."',`net`='".$net."',`due`='".$due."',`cgst`='".$cgst."',`sgst`='".$sgst."',`igst`='".$igst."' where id='".$bill_."'  ");
              }
            }
        }
    }
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ADD WAGES! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="vendors/starrr/dist/starrr.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>



</head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     <?php include 'sidebar.php';?>

        <!-- top navigation -->
       <!-- /topbar menu -->
        <?php include("topbar.php");?>
        <!-- /topbar menu -->
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>

              
            </div>


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>ATTENDANCE <small>DETAIILS</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      

                      
                      
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT MONTH</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="month" name="month" class="form-control col-md-7 col-xs-12" id="month" required="required" >

                    </div>
                  </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT COMPANY</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <select class="form-control col-md-7 col-xs-12 itemName" id="comp_name" name="company" onchange="mywage();"></select>

                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>

<div id="showForm">
</div>

                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
            
      
        

        <!-- /page content -->

        <!-- footer content -->
        <?php include("footer.php");?>
        <!-- /footer content -->
      </div>
    </div>



    <script src="js/jquery.min.js.pagespeed.jm.tURYQi55sA.js"></script>





    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="vendors/switchery/dist/switchery.min.js"></script>
    <!-- Select2 -->
    <script src="vendors/select2/dist/js/select2.full.min.js"></script>
    <!-- Parsley -->
    <script src="vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="vendors/starrr/dist/starrr.js"></script>
    <!-- Custom Theme Scripts -->
        <script src="build/js/custom.min2.js"></script>

<script>


</script>
    <script type="text/javascript">
        function mywage()
        {
            var cname=$("#comp_name option:selected").val();
            var month=$("#month").val();
            var dname=$("#designation").val();
            $.ajax({
                url: 'showform1.php',
                type: 'POST',
                data: {cname: cname,dname:dname,month:month},
                success: function (data) {
                    $("#showForm").html(data);
                },
            });


        }
    </script>

<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $('.itemName').select2({
            placeholder: 'Select company name',
            ajax: {
                url: 'ajaxpro.php',
                dataType: 'json',
                delay: 250,
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>

  </body>
</html>