<?php
include("db.php");
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

    <title>Listing |Bill</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include 'topbar.php';?>

        <?php include 'sidebar.php';?>

        <!-- top navigation -->

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
                                <ul class="nav navbar-right panel_toolbar">
                                    <li> <a href="billing.php"><button type="button" class="btn btn-success">Generate New</button></a></li>
                                </ul>
                                <h2>Company<small>Bill</small></h2>



                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10PX;">SL NO.</th>
                                        <th style="width:60px;">Bill no</th>
                                        <th style="width: 10px;">company name no</th>
                                        <th style="width: 10PX;">Month</th>
                                        <th style="width: 10PX;">Billing Date</th>
                                        <th style="width: 10PX;">Total Amount</th>
                                        <th style="width: 10PX;">Net Amount</th>
                                        <th style="width: 10PX;">Paid</th>
                                        <th style="width: 10PX;">Due</th>

                                        <th style="width: 10PX;">Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <?php
                                    $query = "select cb.*, c.company_name FROM company_bill cb left join company c on cb.company = c.id";
                                    $count=1;
                                    $result = mysqli_query($conn,$query);
                                    while ($row = mysqli_fetch_array($result))
                                    {
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $count; ?></td>
                                            <td align="center"><?php echo $row['billing_no']; ?></td>
                                            <td align="center"><?php echo $row['company_name']; ?></td>
                                            <td align="center"><?php echo date('F Y', strtotime($row['month']));?></td>
                                            <td align="center"><?php echo date('d F Y', strtotime($row['inserted_date']));?></td>
                                            <td align="center"><?php echo $row['total']; ?></td>
                                            <td align="center"><?php echo $row['net']; ?></td>
                                            <td align="center"><?php echo $row['payment']; ?></td>
                                            <td align="center"><?php echo $row['due']; ?></td>
                                            <td align="center">
                                                <?php if($row['due'] == 0){?>
                                                <img src="images/payment_done.jpg" alt="PAY" title="View" height="45" width="55">
                                              <?php } else { ?>
                                                <a href="payment.php?b_no=<?php echo $row["id"];?>"><img src="images/payment_due.jpg" alt="PAY" title="View" height="45" width="55"></a>
                                            <?php } ?>

                                            <a href="g7billing.php?b_no=<?php echo $row["id"];?>"><img src="images/profile.jpg" alt="PRINT" title="View" height="25" width="25"></a></td>
                                        </tr>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>















                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->
<script>
    function myFunction(id)
    {
        var r=confirm("Are you sure you want to delete this record?");
        if (r==true)
        {
            window.location.assign("delete.php?id="+ id);
        }
    }
</script>
<!-- footer content -->
<?php include('footer.php');?>
<!-- /footer content -->
</div>
</div>
<?php
$emp_id = $_GET['id'];
$sel_data=mysqli_query($conn,"select * from emp_data where id='".$emp_id."'");
$res_data=mysqli_fetch_assoc($sel_data);

?>
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">EMPLOYEE PROFILE</h4>
            </div>
            <form action="" method="post">
                <div class="modal-body">

                    <label>NAME</label>
                    <input type="text" id="emp">
                    <input type="text" name="designation" class="form-control" value="<?php echo $res_data['emp_name'];?>">
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
<script type="text/javascript">
    function myfun(e_id)
    {
        $("#emp").val(e_id);


    }
</script>


<script src="js/jquery.min.js.pagespeed.jm.tURYQi55sA.js"></script>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="vendors/nprogress/nprogress.js"></script>
<!-- iCheck -->
<script src="vendors/iCheck/icheck.min.js"></script>
<!-- Datatables -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>

</body>
</html>