<?php
include'db.php';
include ("session.php");
if(isset($_GET['id']))
{
    $sel_data=mysqli_query($conn,"select * from emp_data where id='".$_GET['id']."'");
    $res_data=mysqli_fetch_assoc($sel_data);
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

    <title>Payroll</title>

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

</head>




<body class="nav-md">

<div class="container body">

    <div class="main_container">
        <!-- /topbar menu -->
        <?php include("topbar.php");?>
        <!-- /topbar menu -->

        <!-- /sidebar menu -->
        <?php include("sidebar.php");?>
        <!-- /menu footer buttons -->
        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">




                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Employee <small>Details</small></h2>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="" data-parsley-validate class="form-horizontal form-label-left" action="" method="post" enctype="multipart/form-data" >

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Employee Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="emp-name" required="required" class="form-control col-md-7 col-xs-12" name="emp_name" value="<?php echo $res_data['emp_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="address" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="emp_address" value="<?php echo $res_data['address'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="mobile" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="mobile" value="<?php echo $res_data['mob_no'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Joining Date<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="joining_date" value="<?php echo $res_data['joining_date'];?>">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Uniform Fee<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="uniform" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="uniform" value="<?php if(isset($_GET['id'])){echo $res_data['uniform_fee'];}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mode of deduction<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select id="uniform_amt" class="date-picker form-control col-md-7 col-xs-12" required="required" name="uniform_mode" onchange="show_uniform(this.value)">
                                                <option  value="0" >Select mode</option>
                                                <option value="1" <?php if(isset($_GET['id'])) { if($res_data['uniform_mode'] == 1) echo 'selected=selected';}?>>One time Payment</option>
                                                <option value="2" <?php if(isset($_GET['id'])) { if($res_data['uniform_mode'] == 2) echo 'selected=selected';}?>>Monthly Deduction</option>
                                                <option value="3" <?php if(isset($_GET['id'])) { if($res_data['uniform_mode'] == 3) echo 'selected=selected';}?>>Custom</option>
                                            </select>
                                        </div>
                                    </div>

                                   <!--  <?php if(isset($_GET['id']) && $res_data['uniform_mode']== '1')
                                    {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Total amount<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="uniform_amount" value="<?php if(isset($_GET['id'])){echo $res_data['uniform_amt'];}?>">
                                            </div>
                                        </div>
                                    <?php } if(isset($_GET['id']) && $res_data['uniform_mode']== '2')
                                    {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount to be deduct every month<span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="uniform_amount" value="<?php if(isset($_GET['id'])){echo $res_data['uniform_amt'];}?>">
                                            </div>
                                        </div>
                                    <?php } if(isset($_GET['id']) && $res_data['uniform_mode']== '3')
                                    {
                                        ?>
                                        <div class="form-group">
                                            <label class="control-label col-md-7 col-sm-7 col-xs-12">Uniform charges added in advance section<span class="required">*</span>
                                            </label>
                                        </div>
                                    <?php } ?> -->
                                     <div id="uniform_data">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">BLOOD GROUP<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class=" form-control col-md-7 col-xs-12" required="required" type="text" name="blood_grp" value="<?php if(isset($_GET['id'])){echo $res_data['blood_grp'];}?>">
                                        </div>
                                    </div>
                                          <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">GUARDIAN'S NAME<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class=" form-control col-md-7 col-xs-12" required="required" type="text" name="guardian_name" value="<?php if(isset($_GET['id'])){echo $res_data['guardian_name'];}?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">GUARDIAN'S CONTACT NUMBER<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class=" form-control col-md-7 col-xs-12" required="required" type="text" name="guardian_no" value="<?php if(isset($_GET['id'])){echo $res_data['guardian_no'];}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">UPDATE YOUR PHOTO<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            
                                            <input class=" form-control col-md-7 col-xs-12" type="file" name="photo" required="required" onchange="readURL(this);" value="<?php if(isset($_GET['id'])){echo $res_data['photo'];}?>">
                                            <img id="blah" src="<?php if(isset($_GET['id'])){?>upload/<?php echo $res_data['photo'];}?>" style="height: 150px;width: 150px;" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">UPLOAD YOUR RESUME<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" type="file" name="resume" required="required"> <p><?php if(isset($_GET['id'])){echo $res_data['resume'];}?></p>
                                        </div>
                                    </div>







                                   



                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <input type="submit" class="btn btn-success" value="Submit" name="submit">
                                        </div>
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
<script>

    function show_uniform(mode)
    {
        $.ajax({
            url: 'getuniform.php',
            type: 'POST',
            data: {mode: mode},
            success: function (data) {
                $("#uniform_data").html(data);
            },
        });
    }
</script>
<script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
<?php
include'common.php';


if(isset($_POST['submit']))
   { 

      
    if(isset($_GET['id']))
   {       $resume = $_FILES['resume'];
           $photo=$_FILES['photo'];
           $path = "upload/"; 
             if (!empty($_FILES['resume']['name'])) 
                   {
                    if (!empty($_FILES['photo']['name'])) 
                   {
                     

                      $img = rand(0, 9999) . $_FILES['resume']['name'];
                      $img1 = rand(0, 9999) . $_FILES['photo']['name'];

                        if (move_uploaded_file($_FILES['resume']['tmp_name'], $path . $img)) 
                           {
                        if (move_uploaded_file($_FILES['photo']['tmp_name'], $path . $img1)) 
                        {  
        $update_data = mysqli_query($conn,"UPDATE `emp_data` SET `emp_name`='".$_POST['emp_name']."',`joining_date`='".$_POST['joining_date']."', `address`='".$_POST['emp_address']."',`mob_no`='".$_POST['mobile']."',`uniform_fee`='".$_POST['uniform']."',`uniform_mode`='".$_POST['uniform_mode']."',`uniform_amt`='".$_POST['uniform_amount']."',`guardian_name`='".$_POST['guardian_name']."',`guardian_no`='".$_POST['guardian_no']."',`blood_grp`='".$_POST['blood_grp']."',`resume`='".$img."',`photo`='".$img1."' WHERE id='".$_GET['id']."'");
           
        if($update_data )
        {
            echo "<script>show_update();</script>";
        }
        else {
           echo "<script>show_error();</script>";

        }
                  }
    
            }
   
                   }
                          }
               }
         }





?>