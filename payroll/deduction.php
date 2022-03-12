<?php include("db.php");
include ("session.php");
     
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/ico" />
    
    <title>DEDUCTION! | </title>

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
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
 
   

 


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
                    
                    <h2>DEDUCTION <small>DETAILS</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      
                      
                       
                        <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT EMPLOYEE</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control" id="itemName" name="emp_name" onchange="fetch_select(this.value);"></select>
                        </div>
                       </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">ADVANCE TYPE<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" id="new_select" name="advance_type" onclick="fetch_select_1(this.value);">
                          <option>-SELECT-</option></select>
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">AMOUNT<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text"  class="form-control" id="new_select1" name="amount" readonly="readonly">
                          
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DATE<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date"  class="form-control"  name="month">
                          
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">DEDUCTION AMOUNT<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" type="text" name="ded_amt">
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
function fetch_select(val)
{//lert("gfhgf");
 $.ajax({
 type: 'post',
 url: 'fetch_data.php',
 data: {
  get_option:val
 },
 success: function (response) {
  document.getElementById("new_select").innerHTML=response; 
 }
 });
}

</script>
 <script type="text/javascript">
function fetch_select_1(val)
{//alert("dfgdfh");
 var a= $("#itemName").val();
 $.ajax({
 type: 'post',
 url: 'fetch_data1.php',
 data: {
  get_option:val, binita:a
 },
 success: function (response) {
  $("#new_select1").val(response); 
 }
 });
}

</script>


    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>

    <script type="text/javascript">
        $('#itemName').select2({
            placeholder: 'Select name',
            ajax: {
                url: 'ajaxempadv.php',
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
<?php 
include'common.php';

if (isset($_POST['submit']))  
      {     
    //  var_dump($_POST);exit();
          
          $advance_type = $_POST['advance_type'];
          $month = $_POST['month'];
          $emp_name = $_POST['emp_name'];
          $ded_amt = $_POST['ded_amt'];
        
$sel_emp = mysqli_fetch_assoc(mysqli_query($conn,"select emp_name from advance where id= '$emp_name'"));
          $e_id = $sel_emp['emp_name'];
          

          $query = mysqli_query($conn,"INSERT INTO `deduction` (`advance_type`,`month`,`emp_name`,`ded_amt`)VALUES ('" . $advance_type. "','" . $month. "','" . $e_id. "','" . $ded_amt. "')");
              // var_dump("INSERT INTO `deduction` (`advance_type`,`month`,`emp_name`,`ded_amount`)VALUES ('" . $advance_type. "','" . $month . "','" . $emp_name . "','" . $ded_amt . "')");exit();       
                                        
                               
                              
                         if ($query)
                          {
                              $rem = $_POST['amount'] - $ded_amt;
                              $update = mysqli_query($conn, "UPDATE `advance` SET `Remaining`='" . $rem. "' WHERE id = '" . $emp_name. "' AND advance_type = '".$_POST['advance_type']."' ");



                              echo "<script>show_success();</script>";
                          }
                           else 
                           {
                                    echo "<script>show_error();</script>";
                           }
     } 

