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

        // var_dump($_POST);
        $id='id'.$k;
        $emp_id ='emp_id' . $k;
        $wage ='wage' . $k;
        $total ='total_amt' . $k;
        $working = 'working_days' . $k;
        $designation = 'designation_sel' . $k;
        $monthly_wage = 'monthly_wage' . $k;
        if ($_REQUEST[$working] != '' && !is_null($_REQUEST[$working])) {

            $ins_data= mysqli_query($conn,"UPDATE `attendance` SET  `wage_perday`='".$_REQUEST[$wage]."',  `monthly_wage`='".$_REQUEST[$monthly_wage]."', `designation`='".$_REQUEST[$designation]."', `no_of_days`='".$_REQUEST[$working]."', `total_amt`='".$_REQUEST[$total]."' where id='".$_REQUEST[$id]."'");

//var_dump("UPDATE `attendance` SET  `wage_perday`='".$_REQUEST[$wage]."',  `monthly_wage`='".$_REQUEST[$monthly_wage]."', `designation`='".$_REQUEST[$designation]."', `no_of_days`='".$_REQUEST[$working]."', `total_amt`='".$_REQUEST[$total]."' where id='".$_REQUEST[$id]."'");exit;
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

    <title>Attendance! | </title>

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
                                <form id="demo-form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="billing_insert.php">





                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT MONTH</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input type="month" name="month" class="form-control col-md-7 col-xs-12" id="month" required="required" >

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT COMPANY</label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <select class="form-control col-md-7 col-xs-12 itemName" id="comp_name" name="company"></select>

                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                            <input type="submit" class="btn btn-success" name="submit"/>
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
<script src="build/js/custom.min.js"></script>



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