<?php
include("db.php");
$bill_billing = mysqli_fetch_assoc(mysqli_query($conn,"select * from company_bill where id='".$_GET['b_no']."'"));

if(isset($_POST['submit']))
{
$update = mysqli_query($conn,"UPDATE `company_bill` SET `payment`='".$_POST['payment']."',`due`='".$_POST['due']."',`payment_mode`='".$_POST['payment_mode']."' WHERE id= '".$_GET['b_no']."'");
if($update){

    mysqli_query($conn, "INSERT INTO `balance_sheet`(`date`, `type`, `amount`, `emp_id`,`comp_id`,`c_bill_id`) VALUES (now(), 'cradit' ,'".$_POST['payment']."','','".$bill_billing['company']."','".$_GET['b_no']."')");

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

                                <h2>PAYMENT<small>DETAIILS</small></h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="demo-form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                                    <div class="col-xs-5 col-xs-offset-2">
                                        <p class="lead">Payment</p>

                                        <table class="table table-bordered">
                                            <tbody>
                                            <tr>
                                                <th style="width:50%">Total:</th>
                                                <td><input type="text" readonly  style="width:80px;" id="total" name="total" value="<?php if(isset($bill_billing['total'])) { echo $bill_billing['total'];} else{ echo '0.00';}?>"></td>
                                            </tr><tr>
                                                <th>Total CGST</th>
                                                <td><input type="text" readonly id="cgst" name="cgst" style="width:80px;" value="<?php if(isset($bill_billing['total'])) { echo $bill_billing['cgst'];} else{ echo '0.00';}?> "></td>
                                            </tr>
                                            <tr>
                                                <th>Total SGST:</th>
                                                <td><input type="text" readonly id="sgst" name="sgst" style="width:80px;" value="<?php if(isset($bill_billing['sgst'])) { echo $bill_billing['sgst'];} else{ echo '0.00';} ?>" ></td>
                                            </tr><tr>
                                                <th>Total IGST:</th>
                                                <td><input type="text" readonly style="width:80px;"  id="igst" name="igst" value="<?php if(isset($bill_billing['igst'])) { echo $bill_billing['igst'];} else{ echo '0.00';}?>"></td>
                                            </tr>

                                            <tr>
                                                <th>Grand Total:</th>
                                                <td><input type="text" id="net" readonly name="net" style="width:80px;" value="<?php if(isset($bill_billing['net'])) { echo $bill_billing['net'];} else{ echo '0.00';}?>"></td>
                                            </tr>
                                            <tr>
                                                <th>Last Paid:</th>
                                                <td><input type="text" id="payment" style="width:80px;" value="<?php if(isset($bill_billing['payment'])) { echo $bill_billing['payment'];} else{ echo '';}?>"></td>
                                            </tr>
                                            <tr>
                                                <th>Last Due:</th>
                                                <td><input type="text" id="last_due" style="width:80px;" value="<?php if(isset($bill_billing['due'])) { echo $bill_billing['due'];} else{ echo '';}?>"></td>
                                            </tr>
                                            <tr>
                                                <th>Payment:</th>
                                                <td><input type="text" id="payment" onkeyup="calculatepayment(this.value);" name="payment" style="width:80px;" value=""></td>
                                            </tr>
                                            <tr>
                                                <th>Due:</th>
                                                <td><input type="text" style="width:80px;" readonly id="due" name="due" value=""></td>
                                            </tr><tr>
                                                <th>Payment Mode:</th>
                                                <td>
                                                    <select name="payment_mode" id="payment_mode" onchange="loadPaymentTable(this.value)">
                                                        <option value="cash" selected="true">Cash</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Transfer">Transfer</option>

                                                    </select></td>
                                            </tr>



                                            </tbody>
                                        </table>
                                        <div id="payment_data">

                                        </div>
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
<script>

    function loadPaymentTable(mode)
    {
        $.ajax({
            url: 'getpaymenttable.php',
            type: 'POST',
            data: {mode: mode},
            success: function (data) {
                $("#payment_data").html(data);
            },
        });
    }
    function calculatepayment(payment)
    {
        var net = $("#last_due").val();
        var due= Number(net - payment);
        $("#due").val(due.toFixed(2));


    }

</script>
</body>
</html>