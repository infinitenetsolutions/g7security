<?php
include("db.php");
//check existing data start
$comp_name = mysqli_fetch_assoc(mysqli_query($conn,"select company_name from company where id='".$_POST['company']."'"));
$sel_c_billing = mysqli_query($conn,"select * from company_bill where company='".$_POST['company']."' AND month='".$_POST['month']."'");
$bill_billing = mysqli_fetch_assoc($sel_c_billing);
$bill_ = $bill_billing['id'];

 $a = $_POST['month'];
$b= date("m", strtotime($a));
$c = date("y", strtotime($a));
$d =  date("y", strtotime($a)) + 1;
$e =  date("y", strtotime($a)) - 1;
if ( $b > 3 )
{
    $f = $c .'-' .$d;
}
else
{
    $f = $e .'-' .$c;
}

$sel_bill_id = mysqli_query($conn,"select * from company_bill");
if(mysqli_num_rows($sel_bill_id) > 0)
{

    $max_no = mysqli_fetch_assoc(mysqli_query($conn,"select max(billing_no) as b_no from company_bill"));
    $bill_no_ = $max_no['b_no'];

    $billing_no= explode('/', $bill_no_);
    $billing_no1  = $billing_no[0];
    $billing_no2  = $billing_no[1];
    $new_billing_no = $billing_no1 + 1;
    $new_no = $new_billing_no .'/'.  $f;
}
else
{
    $new_no = '1/'.$f ;
}


if(isset($_POST['submit_data'])) {

if($bill_ == NULL)
{
    if($_POST['payment'] == '')
    {
        $due_amount = $_POST['net'];
    }
    else
        {
        $due_amount = $_POST['due'];
    }
    $insert_bill = mysqli_query($conn,"INSERT INTO `company_bill`(`billing_no`, `company`, `month`,`total`, `net`, `payment`, `due`, `cgst`, `sgst`, `igst`,`payment_mode`,`cheque_date`,`cheque_no`,`bank_name`,`bank_branch`, `acc_no`, `ifsc`, `tran_no`, `tran_date`,`inserted_date`) VALUES ('$new_no','".$_POST['company']."','".$_POST['month']."','".$_POST['total']."','".$_POST['net']."','".$_POST['payment']."','".$due_amount."','".$_POST['cgst']."','".$_POST['sgst']."','".$_POST['igst']."','".$_POST['payment_mode']."','".$_POST['cheque_date']."','".$_POST['cheque_no']."','".$_POST['bank_name']."','".$_POST['bank_branch']."','".$_POST['acc_no']."','".$_POST['ifsc']."','".$_POST['tran_no']."','".$_POST['tran_date']."',  now())");
if($insert_bill)
{
    $sel_cbil= mysqli_fetch_assoc(mysqli_query($conn,"select max(id) as m_id from company_bill"));

   
     mysqli_query($conn, "INSERT INTO `balance_sheet`(`date`, `type`, `amount`, `emp_id`,`comp_id`,`c_bill_id`) VALUES (now(), 'cradit' ,'" . $_POST['payment'] . "','','" . $_POST['company'] . "','".$sel_cbil['m_id']."')");
   }

}

        $k = 1;
    for (; $k < $_POST['count']; $k++) {
$id = 'id' . $k;
        $designation = 'designation' . $k;
        $no_of_emp = 'no_of_emp' . $k;
        $no_of_days = 'no_of_days' . $k;
        $rate = 'rate' . $k;
        $amount = 'amount' . $k;
        if ($_REQUEST[$amount] != '' && !is_null($_REQUEST[$rate])) {
if($_REQUEST[$id] == '' ){

            $sel_max = mysqli_fetch_assoc(mysqli_query($conn, "select max(id) as m_id from company_bill"));
            $bill_number = $sel_max['m_id'];
            $insert = mysqli_query($conn, "INSERT INTO `company_billing`(`bill_no`, `designation`, `no_of_emp`, `no_of_days`, `rate`, `amount`, `billing_date`,`company`,`month`) VALUES ('" . $bill_number . "','" . $_REQUEST[$designation] . "','" . $_REQUEST[$no_of_emp] . "','" . $_REQUEST[$no_of_days] . "','" . $_REQUEST[$rate] . "','" . $_REQUEST[$amount] . "',now(),'" . $_POST['company'] . "','" . $_POST['month'] . "')");

}

        else {

                    $update_value= mysqli_query($conn,"UPDATE `company_billing` SET `rate`='".$_REQUEST[$rate]."',`amount`='".$_REQUEST[$amount]."',`updated_date`=now() where id='".$_REQUEST[$id]."'");

//var_dump("UPDATE `company_billing` SET `rate`='".$_REQUEST[$rate]."',`amount`='".$_REQUEST[$amount]."',`updated_date`=now() where id='".$_REQUEST[$id]."'");exit;
                }
            }

        }
   if($update_value)
   {
       $updat_bill = mysqli_query($conn,"UPDATE `company_bill` SET `total`='".$_POST['total']."',`net`='".$_POST['net']."',`payment`='".$_POST['payment']."',`due`='".$_POST['due']."',`cgst`='".$_POST['cgst']."',`sgst`='".$_POST['sgst']."',`igst`='".$_POST['igst']."',`payment_mode`='".$_POST['payment_mode']."',`cheque_date`='".$_POST['cheque_date']."',`cheque_no`='".$_POST['cheque_no']."',`bank_name`='".$_POST['bank_name']."',`bank_branch`='".$_POST['bank_branch']."',`acc_no`='".$_POST['acc_no']."',`ifsc`='".$_POST['ifsc']."',`tran_no`='".$_POST['tran_no']."',`tran_date`='".$_POST['tran_date']."'  WHERE id='".$bill_."' ");
       if($updat_bill){

        $bal= mysqli_query($conn,"UPDATE `balance_sheet` SET `date`=now(),`amount`= '" . $_POST['payment']. "' WHERE c_bill_id = '".$bill_."'");

       }}
        if($insert || $update_value){
            header("location: billing.php");

        }

}
date_default_timezone_set('Asia/Kolkata');

$date_get = $_POST['month'];

$orderdate = explode('-', $date_get);
$year= $orderdate[0];
$month = $orderdate[1];

$total_days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);

$sel_gst = mysqli_fetch_assoc(mysqli_query($conn,"select gstin from company where id='".$_POST['company']."' "));
$gst_type = substr($sel_gst['gstin'], 0, 2);
if($gst_type == 20)
{
    $gstin = 'c';
}else {
    $gstin = 'i';
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
    <link rel="icon" href="images/logo.png" type="image/ico" />

    <title>Listing |Employee</title>

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



                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_content">

                                <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
                                    <input type="hidden" name="company" value="<?php echo $_POST['company'];?>">
                                    <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Billing for <?php echo $comp_name['company_name'];?></small></h2>



                                                <div class="clearfix"></div>

                                            </div>
                                            <div class="row">

                                                <div class="col-sm-4">
                                                    <!--calculate start-->

                                                    <!--calculate end-->
                                                </div>
                                                <div class="col-sm-4">

                                                </div>

                                            </div>
                                            <div class="row">
                                                <!-- accepted payments column -->

                                                <!-- /.col -->

                                                <!-- /.col -->
                                            </div>

                                            <div>
                                                    <div style="height: 70px;">
                                                    <label class="control-labe">Search</label>  <input id="inputfilter" type="text" style="border-radius: 9px; width: 300px; height: 40px; font-size: 15px;"/>


                                                    <input type="submit" class="btn btn-success col-md-offset-6" name="submit_data"/>
                                                </div>
                                            </div>

                                            <div class="col-xs-9">

                                            <table id="filterme" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th width="5%;">SL no</th>
                                                    <th width="25%;">Employee</th>
                                                    <th width="20%;">No of emp</th>
                                                    <th width="20%;">total days</th>
                                                    <th width="10%;">Rate</th>
                                                    <th width="30%;">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $sel_data = mysqli_query($conn,"select a.*, d.designation as d_name from attendance a left join designation d on a.designation = d.id where a.month = '".$_POST['month']."' AND a.company_id='".$_POST['company']."' group by a.designation");
                                                $count = 1;
                                                while($data = mysqli_fetch_assoc($sel_data))
                                                {
                                                    $sel_j = mysqli_query($conn,"select * from company_billing where company = '".$_POST['company']."' AND month='".$_POST['month']."'  AND designation ='".$data['designation']."'");
                                                    $result_billing = mysqli_fetch_assoc($sel_j);
                                                    $rate_value = $result_billing['rate'];
                                                    $id = $result_billing['id'];
                                                    $amount_value = $result_billing['amount'];
                                                    ?>




                                                    <tr style="border-top: transparent; border-bottom: transparent;">
                                                        <td><?php echo $count;?>
                                                        <input type="hidden" id="monthdays" value="<?php echo $total_days_in_month;?>">
                                                            <input type="hidden" name="id<?php echo $count;?>" value="<?php if(isset($id)){ echo $id; } else { echo'';}?>">

                                                        </td>
                                                        <?php $sel_details =  mysqli_fetch_assoc(mysqli_query($conn,"select COUNT(id) as e_id, monthly_wage, sum(no_of_days) as w_days from attendance where designation = '".$data['designation']."' AND month = '".$_POST['month']."' AND company_id='".$_POST['company']."'" )); ?>
                                                        <td>
                                                            <?php echo $data['d_name'];?>
                                                            <input type="hidden" name="designation<?php echo $count;?>" value="<?php echo $data['designation'];?>"/>
                                                        </td>
                                                        <td>
                                                            <?php echo $sel_details['e_id'];?>
                                                            <input type="hidden" name="no_of_emp<?php echo $count;?>" value="<?php echo $sel_details['e_id'];?>">
                                                            <input type="hidden" name="no_of_days<?php echo $count;?>" value="<?php echo $sel_details['w_days'];?>">
                                                        </td>
                                                        <td id="total_days<?php echo $count; ?>">
                                                            <?php echo $sel_details['w_days'];?>

                                                        </td>
                                                        <td>
                                                            <input type="text" width="50px;" name="rate<?php echo $count;?>" value="<?php if(isset($rate_value)){ echo $rate_value; } else echo '';?>" id="rate<?php echo $count;?>" onkeyup="calculateAmount(this.value,<?php echo $count; ?>);">
                                                        </td>
                                                        <td id="total_amt<?php echo $count; ?>">
                                                            <?php if(isset($rate_value)){ echo $amount_value; }?>
                                                        </td>

                                                        <input type="hidden" <?php if(isset($amount_value)){ ?> value="<?php echo $amount_value;?>" <?php }?> name="amount<?php echo $count; ?>" id="amount<?php echo $count; ?>"/>


                                                    </tr>
                                                    <?php $count++;
                                                } ?>

<input type="hidden" name="count" id="count" value="<?php echo $count; ?>"/>
<input type="hidden" name="gstin" id="gstin" value="<?php echo $gstin; ?>"/>


                                                       </tbody>
                                            </table>


                                        </div>

                                            <div class="col-xs-3">
                                                <p class="lead">  <a href="" onmouseover="calculate()" title="Use 'Ctrl+Alt+C' to calculate">Calculate</a></p>

                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
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
                                                        </tr><tr>
                                                            <th>Payment:</th>
                                                            <td><input type="text" id="payment" name="payment" onkeyup="calculatepayment(this.value);"  style="width:80px;" value="<?php if(isset($bill_billing['payment'])) { echo $bill_billing['payment'];} else{ echo '';}?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Due:</th>
                                                            <td><input type="text" style="width:80px;" readonly id="due" name="due" value="<?php if(isset($bill_billing['due'])) { echo $bill_billing['due'];} else{ echo '0.00';}?>"></td>
                                                        </tr><tr>
                                                            <th>Payment Mode:</th>
                                                            <td>
                                                                <select name="payment_mode" id="payment_mode" onchange="loadPaymentTable(this.value)">
                                                                    <option  <?php if($bill_billing['payment_mode'] == 'Cash'){echo'selected=selected'; }?> value="cash" selected="true">Cash</option>
                                                                    <option <?php if($bill_billing['payment_mode'] == 'Cheque'){echo'selected=selected'; }?> value="Cheque">Cheque</option>
                                                                    <option <?php if($bill_billing['payment_mode'] == 'Transfer'){echo'selected=selected'; }?> value="Transfer">Transfer</option>

                                                                </select></td>
                                                        </tr>



                                                        </tbody>
                                                    </table>
                                                <div id="payment_data">
                                                    <?php if($bill_billing['payment_mode'] == 'Transfer'){
                                                        ?>

                                                        <table class="table table-bordered" >
                                                            <tr>
                                                                <th>A/C no:</th>
                                                                <td><input type="text" name="acc_no" style="width:120px;" value="<?php if(isset($bill_billing['acc_no'])) { echo $bill_billing['acc_no'];} else{ echo '';}?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>IFSC Code:</th>
                                                                <td><input type="text" name="ifsc" style="width:120px;" value="<?php if(isset($bill_billing['ifsc'])) { echo $bill_billing['ifsc'];} else{ echo '';}?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tran no:</th>
                                                                <td><input type="text" name="tran_no" style="width:120px;" value="<?php if(isset($bill_billing['tran_no'])) { echo $bill_billing['tran_no'];} else{ echo '';}?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Tran date:</th>
                                                                <td><input type="date" name="tran_date" style="width:120px;" value="<?php if(isset($bill_billing['tran_date'])) { echo $bill_billing['tran_date'];} else{ echo '';}?>"></td>
                                                            </tr>
                                                        </table>

                                                    <?php } else
                                                        if($bill_billing['payment_mode'] == 'Cheque'){
                                                    ?>

                                                    <table class="table table-bordered" >
                                                        <tr>
                                                            <th>Cheque Date:</th>
                                                            <td><input type="date" name="cheque_date" style="width:120px;" value="<?php if(isset($bill_billing['cheque_date'])) { echo $bill_billing['cheque_date'];} else{ echo '';}?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Cheque Number:</th>
                                                            <td><input type="text" name="cheque_no" style="width:120px;" value="<?php if(isset($bill_billing['cheque_no'])) { echo $bill_billing['cheque_no'];} else{ echo '';}?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Bank Name:</th>
                                                            <td><input type="text" name="bank_name" style="width:120px;" value="<?php if(isset($bill_billing['bank_name'])) { echo $bill_billing['bank_name'];} else{ echo '';}?>"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Bank Branch:</th>
                                                            <td><input type="text" name="bank_branch" style="width:120px;" value="<?php if(isset($bill_billing['bank_branch'])) { echo $bill_billing['bank_branch'];} else{ echo '';}?>"></td>
                                                        </tr>
                                                    </table>
                                                    <?php } ?>
                                                 </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                            </div>
                            </form>








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

<script type="text/javascript">
    function calculateAmount(rate,count)
    {
    var days = $("#total_days" + count).html();
    var monthdays = $("#monthdays").val();
        var ratePerDay = rate/monthdays;
        var total = ratePerDay * days;
        $("#total_amt" + count).html(total.toFixed(2));
        $("#amount" + count).val(total.toFixed(2));

    }

    function calculatepayment(payment)
    {
    var net = $("#net").val();
    var due= Number(net - payment);
        $("#due").val(due.toFixed(2));


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

<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#inputfilter").keyup(function(){
            filter = new RegExp($(this).val(),'i');
            $("#filterme tbody tr").filter(function(){
                $(this).each(function(){
                    found = false;
                    $(this).children().each(function(){
                        content = $(this).html();
                        if(content.match(filter))
                        {
                            found = true
                        }
                    });
                    if(!found)
                    {
                        $(this).hide();
                    }
                    else
                    {
                        $(this).show();
                    }
                });
            });
        });
    });
</script>
<script>
    function calculate() {
        var a = $("#count").val();
        var gst = $("#gstin").val();
        var sum = 0;
        var cgst = 0;
        var sgst = 0;
        var igst = 0;

        for (var j = 1; j < a; j++) {
            sum = sum + Number($("#amount" + j).val());
        }
        if(gst == 'c') {
            var igst = 0;
            var cgst = sum * 0.09;
            var sgst = sum * 0.09;
            var net = Number(sum + cgst + sgst);
        } else {
            var igst = sum * 0.18;
            var cgst = 0;
            var sgst = 0;
            var net = Number(sum + igst);
        }
$("#total").val(Number(sum).toFixed(2));
$("#cgst").val(Number(cgst).toFixed(2));
$("#sgst").val(Number(sgst).toFixed(2));
$("#igst").val(Number(igst).toFixed(2));
$("#net").val(Number(net).toFixed(2));
    }


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



</script>

</body>
</html>