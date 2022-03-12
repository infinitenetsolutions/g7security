<?php
include("db.php");
include ("session.php");
$count_emp = mysqli_query($conn,"select count(id) as eid FROM emp_data");
$emp_no = mysqli_fetch_array($count_emp);
if(isset($_POST['submit']))
{

$emp_number = $emp_no['eid'];
$k = 1;
for (; $k <= $emp_number; $k++) {

    $emp_id ='emp_id' . $k;
    $wage ='wage' . $k;
    $total ='total_amt' . $k;
   $working = 'working_days' . $k;
    $monthly_wage = 'monthly_wage' . $k;
if ($_REQUEST[$working] != '' && !is_null($_REQUEST[$working])) {


$ins_data= mysqli_query($conn,"INSERT INTO `attendance`(`month`, `company_id`, `emp_id`, `no_of_days`, `wage_perday`,`monthly_wage`,`total_amt`) VALUES ('".$_REQUEST['month']."','".$_REQUEST['cname']."','".$_REQUEST[$emp_id]."','".$_REQUEST[$working]."','".$_REQUEST[$wage]."','".$_REQUEST[$monthly_wage]."','".$_REQUEST[$total]."')");
}
 }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- PAGE TITLE -->
  <title>Job Portal - Jobs</title>

  <link rel="shortcut icon" href="images/favicon.ico">

  <link rel="stylesheet" href="css/jobs.style.css">
  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  

<style type="text/css">
  .panel-default>.panel-heading{
    background-color: #f5f5f500;
    border-color: #ddd0;
  }
  .panel-default{
    border-color: #ddd0;
  }
  .gl-job-list-item-wrapper a {
    padding: 20px 0;
  }
</style>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<script>
  $(document).ready(function(){
    $('#search_text').keyup(function(){
       var txt = $(#search_text).val();
      //alert('dds');exit;
       if(txt!= '')
       {

       }
       else
       {
        $('#result').html('');
        $.ajax({
          url:"index.php",
          method:"post",
          data:{search:txt},
          dataType:"text",
          success:function(data)
          {
            $('#result').html(data);
          }
        });

       }

    });
  });
</script>
<script>
  $(document).ready(function(){
    $('#search_text1').keyup(function(){
       var txt = $(#search_text1).val();
      //alert('dds');exit;
       if(txt!= '')
       {

       }
       else
       {
        $('#result').html('');
        $.ajax({
          url:"index.php",
          method:"post",
          data:{search1:txt},
          dataType:"text",
          success:function(data)
          {
            $('#result').html(data);
          }
        });

       }

    });
  });




</script>


</head>

<body class="nav-md">
    <div class="container body">
      <div class="main_container">
    
        <?php include("sidebar.php");?>
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