<?php
include'db.php';
if(isset($_GET['id']))
{
    $sel_data=mysqli_query($conn,"select * from emp_data where id='".$_GET['id']."'");
    $res_data=mysqli_fetch_assoc($sel_data);
}
?>


<?php

include'common.php';


if(isset($_POST['submit']))
{

        $insert = mysqli_query($conn,"INSERT INTO `emp_data`(`emp_name`, `address`, `mob_no`, `joining_date`, `uniform_fee`, `uniform_mode`, `uniform_amt`, `status`) VALUES ('".$_POST['emp_name']."','".$_POST['emp_address']."','".$_POST['mobile']."','".$_POST['joining_date']."','".$_POST['uniform']."','".$_POST['uniform_mode']."','".$_POST['uniform_amount']."','1')");

        if($insert){
            if($_POST['uniform_mode']== 2) {

                {

                    $sel_emp_data = mysqli_fetch_assoc(mysqli_query($conn,"select max(id) as e_id from emp_data"));
                    $emp_id = $sel_emp_data['e_id'];


                    $insert_uniform = mysqli_query($conn, "INSERT INTO `advance`(`advance_type`, `month`, `emp_name`,`amount`,`paid_for`) VALUES ('uniform_monthly','".$_POST['uniform_amount_from']."','$emp_id','" . $_POST['uniform'] . "','UNIFORM PER MONTH')");
                    if($insert_uniform)
                    {
                        $deduction_month = $_POST['uniform'] / $_POST['uniform_amount'];
                        $today = $_POST['uniform_amount_from'];
                        $nextday = strftime("%Y-%m-%d", strtotime("$today +1 month"));


                        date_default_timezone_set("Asia/Kolkata");
                        $orderdate = explode('-', $today);
                        $year= $orderdate[0];
                        $month = $orderdate[1];
                        $day   = $orderdate[2];


                        $a=$deduction_month + $month;
                      //  echo($deduction_month);
                        for (; $month < $a; $month++)
                        {

                           $b= "$year-$month-$day";

                            $ins_deduct= mysqli_query($conn,"INSERT INTO `deduction`(`advance_type`, `month`, `emp_name`, `ded_amt`) VALUES ('uniform_monthly','$b','$emp_id','".$_POST['uniform_amount']."')");

                        }



                    }
                }
            }


            if($_POST['uniform_mode']== 3){
                {

                    $sel_emp_data = mysqli_fetch_assoc(mysqli_query($conn,"select max(id) as e_id from emp_data"));
                    $emp_id = $sel_emp_data['e_id'];


                    $insert_uniform = mysqli_query($conn, "INSERT INTO `advance`(`advance_type`, `month`, `emp_name`,`amount`,`Remaining`,`paid_for`) VALUES ('UNIFORM','".date('Y-m-d')."','$emp_id','" . $_POST['uniform'] . "','" . $_POST['uniform'] . "','UNIFORM AMOUNT')");

                }}
            echo "<script>show_success();</script>";
        }
        else
        {
            echo "<script>show_error();</script>";
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
                                <form id="" data-parsley-validate class="form-horizontal form-label-left" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Employee Name<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="text" id="emp-name" required="required" class="form-control col-md-7 col-xs-12" name="emp_name" value="<?php if(isset($_GET['id'])){echo $res_data['emp_name'];}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="address" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="emp_address" value="<?php if(isset($_GET['id'])){echo $res_data['address'];}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No<span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input id="mobile" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="mobile" value="<?php if(isset($_GET['id'])){echo $res_data['mob_no'];}?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Joining
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class="date-picker form-control col-md-7 col-xs-12" type="date" name="joining_date" value="">
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

                                    <?php if(isset($_GET['id']) && $res_data['uniform_mode']== '1')
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
                                    <?php } ?>






                                    <div id="uniform_data">
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
</body>
</html>
