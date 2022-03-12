<?php include("db.php");
include ("session.php");
if (isset($_POST['save']))
{


    $designation = $_POST['designation'];
    $query = mysqli_query($conn, "INSERT INTO `designation` (`designation`)VALUES ('" . $designation . "')");





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
                            <ul class="nav navbar-right panel_toolbar">
                                <li><button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm1">DESGINATION LIST</button>
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-sm">ADD DESGINATION</button></li>
                            </ul>
                            <h2>WAGES <small>DETAIILS</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT COMPANY</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">

                                        <select class="form-control col-md-7 col-xs-12 itemName" name="company"></select>

                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT DESIGNATION</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <?php
                                        $query = "SELECT id,designation FROM designation ORDER BY ID DESC";
                                        $result = mysqli_query($conn,$query);
                                        ?>

                                        <select  name="desig" class="form-control col-md-7 col-xs-12">
                                            <option>---SELECT----</option>
                                            <?php
                                            while ($row = mysqli_fetch_array($result))
                                            {
                                                echo "<option value='".$row['id']."'>".$row['designation']."</option>";
                                            }
                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">ADD WAGES<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="wages">
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





<div class="modal fade bs-example-modal-sm1" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">DESIGNATION</h4>
            </div>

            <div class="modal-body" style="overflow: auto; height: 300px;">

                <table id="datatable" class="table table-striped table-bordered" >
                    <thead>
                    <tr>
                        <th>Sl no</th>
                        <th>Designation</th>
                        <th>Action</th>

                    </tr>
                    </thead>


                    <tbody >
                    <?php
                    $query = "select * FROM designation";
                    $count=1;
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_array($result))
                    {
                        ?>
                        <tr>
                            <td><?php echo $count;?></td>
                            <td><?php echo $row['designation']; ?></td>
                            <td><a href="#" onclick="myFunction('<?php echo $row['id'];?>')"><img src="images/delete.png" alt="Delete" height="25" width="25"></a> </td>

                        </tr>
                        <?php  $count++; } ?>

                    </tbody></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="submit" class="btn btn-primary" name="save"/>
            </div>

        </div>
    </div>
</div>




<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">DESIGNATION</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">

                    <label>ADD DESIGNATION</label>
                    <input type="text" name="designation" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="save"/>
                </div>

        </div>
    </div>
</div>




</div>
</div>
</div>

<button class="gl-side-menu-close-button" id="gl-side-menu-close-button">Close Menu</button>
</div>
</div>
</div>
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
    $('.itemName').select2({
        placeholder: 'Select an item',
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

<script>
    function myFunction(id)
    {
        var r=confirm("Are you sure you want to delete this record?");
        if (r==true)
        {
            window.location.assign("delete.php?d_id="+ id);
        }
    }
</script>
</body>
</html>
<?PHP
include'common.php';

if (isset($_POST['submit']))
{
    //var_dump($_POST);exit();

    $company = $_POST['company'];

    $desig = $_POST['desig'];
    $wages = $_POST['wages'];

    $query = mysqli_query($conn, "INSERT INTO `wages` (`company`,`desig`,`wages`)VALUES ('" . $company . "','" . $desig . "','" . $wages . "')");




    if ($query)
    {
        echo "<script>show_success();</script>";
    }
    else
    {
        echo "<script>show_error();</script>";
    }
}

?>
