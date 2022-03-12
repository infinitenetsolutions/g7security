<?php include("db.php");
include ("session.php");
session_start();
// var_dump($_SESSION['user']);exit();

  
     


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
        
            <!-- /sidebar menu -->
             <?php include("sidebar.php");?>
            <!-- /menu footer buttons -->
            
        <!-- top navigation -->
        <!-- /topbar menu -->
        <?php include("topbar.php");?>
        <!-- /topbar menu -->
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
             

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    
      </div>
                    
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>ADVANCE <small>DETAILS</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT ADVANCE TYPE</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select  name="advance_type" class="form-control col-md-7 col-xs-12">
                      <option>---SELECT---</option>  
                      <option value="PERSONAL">PERSONAL</option>
<!--                      <option value="UNIFORM">UNIFORM</option>-->
                      <option value="MISCELLANEOUS">MISCELLANEOUS</option>
                      </select>
                      </div>
                      </div> 
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT MONTH</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="date" name="month" class="form-control col-md-7 col-xs-12">
                      
                         </div>
                        </div> 
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT EMPLOYEE</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-7 col-xs-12 itemName" name="emp_name"></select>
                        </div>
                       </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">AMOUNT<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="amount">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">PAID FOR<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="paid_for">
                        </div>
                      </div>
                      
                       <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          
                          <input type="submit" class="btn btn-success" name="submit"/>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>

     

                      
                   
                      
                      
                    
                      
                      
                      
                  

                      
                     
            </div>

            
                    </form>
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
    <script src="build/js/custom.min.js"></script>


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
            placeholder: 'Select name',
            ajax: {
                url: 'ajaxemp.php',
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
<?PHP 
include'common.php';
if (isset($_POST['submit']))  
      {     
         //var_dump($_POST);exit();
          
          $advance_type = $_POST['advance_type'];
          $month = $_POST['month'];
          $emp_name = $_POST['emp_name'];
          $amount = $_POST['amount'];
          $paid_for = $_POST['paid_for'];
          $sel_adv = mysqli_query($conn,"select * from advance where emp_name = '" . $emp_name . "' AND advance_type = '$advance_type' ");


          if(mysqli_num_rows($sel_adv) > 0)
          {
                  $res_ad = mysqli_fetch_assoc($sel_adv);
                  $u_id = $res_ad['id'];
                  $new_amt = $res_ad['Remaining'] + $amount;

                  $query = mysqli_query($conn, "UPDATE `advance` SET `month`='" . $month . "',`amount`='" . $amount . "',`Remaining`='" . $new_amt . "',`paid_for`= '" . $paid_for . "' WHERE id= '$u_id'");

                  if ($query) {

                      $query_details = mysqli_query($conn, "INSERT INTO `adv_details` (`advance_type`,`date`,`emp_name`,`amount`,`paid_for`)VALUES ('" . $advance_type . "','" . $month . "','" . $emp_name . "','" . $amount . "','" . $paid_for . "')");
                      if($query_details)
                      {
                          mysqli_query($conn, "INSERT INTO `balance_sheet`(`date`, `type`, `amount`,`emp_id`) VALUES ('" . $month . "','debit','" . $amount . "','" . $emp_name . "')");
                      }

                  }
        }


        else

            {


          $query = mysqli_query($conn, "INSERT INTO `advance` (`advance_type`,`month`,`emp_name`,`amount`,`Remaining`,`paid_for`)VALUES ('" . $advance_type. "','" . $month . "','" . $emp_name . "','" . $amount . "','" . $amount . "','" . $paid_for . "')");
                      
                                        
                               
                              
                         if ($query)
                          {
                              $query_details = mysqli_query($conn, "INSERT INTO `adv_details` (`advance_type`,`date`,`emp_name`,`amount`,`paid_for`)VALUES ('" . $advance_type. "','" . $month . "','" . $emp_name . "','" . $amount . "','" . $paid_for . "')");

                              if($query_details)
                              {
                                  mysqli_query($conn, "INSERT INTO `balance_sheet`(`date`, `type`, `amount`, `emp_id`) VALUES ('" . $month . "', 'debit' ,'" . $amount . "','" . $emp_name . "')");
                              }



                              echo "<script>show_success();</script>";
                          }
                           else 
                           {
                                   echo "<script>show_error();</script>";
                           }
     } }
