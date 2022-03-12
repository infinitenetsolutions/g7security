<?php
include "db.php";

if(isset($_POST['submit']))
{

    $c = $_POST['count'];
    $k = 1;
    for (; $k <= $c; $k++) {

        // var_dump($_POST);
        $id='id'.$k;
        $rate ='rate' . $k;
        $amount ='amount' . $k;
        if ($_REQUEST[$amount] != '' && !is_null($_REQUEST[$amount])) {

            $update_data= mysqli_query($conn,"UPDATE `company_billing` SET `rate`='".$_REQUEST[$rate]."',`amount`='".$_REQUEST[$amount]."',`updated_date`=now() where id='".$_REQUEST[$id]."'");

//var_dump("UPDATE `company_billing` SET `rate`='".$_REQUEST[$rate]."',`amount`='".$_REQUEST[$amount]."',`updated_date`=now() where id='".$_REQUEST[$id]."'");exit;
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

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="x_panel">
                                            <div class="x_title">
                                                <h2>Billing</small></h2>



                                                <div class="clearfix"></div>

                                            </div>
                                            <div>
                                                <div style="height: 70px;">
                                                    <label class="control-labe">Search</label>  <input id="inputfilter" type="text" style="border-radius: 9px; width: 300px; height: 40px; font-size: 15px;"/>

                                                    <input type="submit" class="btn btn-success col-md-offset-6" name="submit"/>
                                                </div>
                                            </div>
                                            <table id="filterme" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                <thead>
                                                <tr>
                                                    <th width="50px;">SL no</th>
                                                    <th width="300px;">Employee</th>
                                                    <th width="100px;">No of emp</th>
                                                    <th width="100px;">total days</th>
                                                    <th width="150px;">Rate</th>
                                                    <th width="200px;">Amount</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $sel_databill = mysqli_query($conn,"select company_billing.*,designation.designation as desg from company_billing left join designation on company_billing.designation=designation.id where bill_no='".$_GET['bill_id']."'");
                                                $count = 1;

                                                while($data = mysqli_fetch_assoc($sel_databill))
                                                {
                                                    date_default_timezone_set('Asia/Kolkata');

                                                    $date_get = $data['month'];

                                                    $orderdate = explode('-', $date_get);
                                                    $year= $orderdate[0];
                                                    $month = $orderdate[1];

                                                    $total_days_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$year);

                                                    ?>




                                                    <tr style="border-top: transparent; border-bottom: transparent;">
                                                        <td><?php echo $count;?>
                                                            <input type="hidden" id="monthdays" value="<?php echo $total_days_in_month;?>">
                                                            <input type="hidden" name="id<?php echo $count;?>" value="<?php echo $data['id'];?>">
                                                        </td>
                                                        <td>
                                                            <?php echo $data['desg'];?>
                                                            <input type="hidden" name="designation<?php echo $count;?>" value="<?php echo $data['designation'];?>"/>
                                                        </td>
                                                        <td>
                                                            <?php echo $data['no_of_emp'];?>
                                                            </td>
                                                        <td id="total_days<?php echo $count;?>">
                                                            <?php echo $data['no_of_days'];?>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="rate<?php echo $count;?>" id="rate<?php echo $count;?>" value="<?php echo $data['rate'];?>" onkeyup="calculateAmount(this.value,<?php echo $count; ?>);">
                                                        </td>
                                                        <td id="total_amt<?php echo $count; ?>">
                                                            <?php echo $data['amount'];?>
                                                        </td>

                                                        <input type="hidden" name="amount<?php echo $count; ?>" id="amount<?php echo $count; ?>"/>


                                                    </tr>
                                                    <?php $count++;
                                                } ?>

                                                <input type="hidden" name="count" value="<?php echo $count; ?>"/>









                                                </tbody>
                                            </table>


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


</body>
</html>
