<?php
include("db.php");

$c = $_POST['count'];
$month = $_POST['month'];
$k = 1;
for (; $k < $c; $k++)
{
    $emp_id = 'emp_id' . $k;
    $amount = 'net_' . $k;

    $sel = mysqli_query($conn,"select * from salary_payment where emp_id = '".$_REQUEST[$emp_id]."' AND month = '".$_REQUEST['month']."'");
 if(mysqli_num_rows($sel) > 0)
 {
     $update = mysqli_query($conn,"UPDATE `salary_payment` SET `salary`= '".$_REQUEST[$amount]."' WHERE emp_id = '".$_REQUEST[$emp_id]."' AND month = '".$_REQUEST['month']."'");
 }else
 {
     $insert = mysqli_query($conn,"INSERT INTO `salary_payment`(`emp_id`, `month`, `salary`, `payment`) VALUES ('".$_REQUEST[$emp_id]."','".$_REQUEST['month']."','".$_REQUEST[$amount]."','0')");
 }
}
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->


    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="print_salary.php">
    <input type="hidden" name="cname" value="<?php echo $_POST['cname'];?>">
    <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
<h4> Salary slip for the month of <?php echo  date("F Y", strtotime($_REQUEST['month']));?> </h4>
            <div class="x_content">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>

                        <th>SL No.</th>
                        <th>Guard Name</th>
                        <!--                        <th>Party Name</th>-->
                        <th>Basic</th>
                        <th>Total Days</th>

                        <!-- <th>Gross wages</th>-->
                        <!--                        <th>Adv taken</th>-->
                        <th>Adv Deduct</th>
                        <th>Uniform</th>
                        <th>Misc</th>
                        <th>NET</th>
                        <th>Signature</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $sel_data = mysqli_query($conn,"select a.*, e.emp_name from attendance a left join emp_data e on a.emp_id = e.id WHERE a.month =  '".$_POST['month']."'GROUP BY a.emp_id ");
                    $count=1;
                    $number_data = mysqli_num_rows($sel_data);
                    while($res_data = mysqli_fetch_assoc($sel_data)){
                        ?>
                        <tr>
                            <input type="hidden" id="count" value="<?php echo $number_data;?>"/>
                            <td><?php echo $count;?></td>
                            <td><?php echo $res_data['emp_name'];?></td>
                            <!-- <td>--><?php //echo $res_data['company_name'];?><!--</td>-->
                            <td id="amount<?php echo $count;?>"><?php
                                $sel_data2 = mysqli_query($conn,"select SUM(no_of_days) as t_days, SUM(total_amt) as t_amt from attendance where `emp_id`= '".$res_data['emp_id']."' AND month =  '".$_POST['month']."'");
                                $res_data2 = mysqli_fetch_assoc($sel_data2);
                                echo $res_data2['t_amt'];?>
                            </td>
                            <td>
                                <?php
                                echo $res_data2['t_days'];
                                ?>
                            </td>


                            <!-- <td><?php echo $res_data['monthly_wage'];?></td> -->
                            <?php
                            $sel1 = mysqli_fetch_assoc(mysqli_query($conn,"select amount from advance where emp_name ='".$res_data['emp_id']."' AND advance_type='PERSONAL' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            $sel2 = mysqli_fetch_assoc(mysqli_query($conn,"select amount from advance where emp_name ='".$res_data['emp_id']."' AND advance_type='UNIFORM' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            $sel3 = mysqli_fetch_assoc(mysqli_query($conn,"select amount from advance where emp_name ='".$res_data['emp_id']."' AND advance_type='MISCELLANEOUS' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));

                            $sel4 = mysqli_fetch_assoc(mysqli_query($conn,"select ded_amt from deduction where emp_name ='".$res_data['emp_id']."' AND advance_type='PERSONAL' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            $sel5 = mysqli_fetch_assoc(mysqli_query($conn,"select ded_amt from deduction where emp_name ='".$res_data['emp_id']."' AND advance_type='uniform_monthly' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            $sel6 = mysqli_fetch_assoc(mysqli_query($conn,"select ded_amt from deduction where emp_name ='".$res_data['emp_id']."' AND advance_type='MISCELLANEOUS' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            $sel7 = mysqli_fetch_assoc(mysqli_query($conn,"select uniform_mode from emp_data where id ='".$res_data['emp_id']."'"));
                            $sel8 = mysqli_fetch_assoc(mysqli_query($conn,"select ded_amt from deduction where emp_name ='".$res_data['emp_id']."' AND advance_type='UNIFORM' AND date_format(month, '%Y-%m') = '".$_POST['month']."'"));
                            ?>
                            <!--                            <td>--><?php //echo $sel1['amount'];?><!--</td>-->
                            <!--                           <td>--><?php //echo $sel1['amount'];?><!--</td>-->
                            <td id="general<?php echo $count;?>"><?php if(isset($sel4['ded_amt']) && $sel4['ded_amt']!=''){ echo $sel4['ded_amt']; } else echo '0'?></td>
                            <td id="uniform<?php echo $count;?>">
                                <?php if($sel7['uniform_mode'] == 2) {
                                    if (isset($sel5['ded_amt']) && $sel5['ded_amt'] != '') {
                                        echo $sel5['ded_amt'];
                                    } else
                                        echo '0';

                                }
                                if($sel7['uniform_mode'] == 3)
                                {
                                    if (isset($sel8['ded_amt']) && $sel8['ded_amt'] != '') {
                                        echo $sel8['ded_amt'];
                                    } else
                                        echo'0';
                                }

                                if($sel7['uniform_mode'] == 1)
                                {
                                    echo'0';
                                }
                                ?>

                            </td>
                            <td id="misc<?php echo $count;?>"><?php if(isset($sel6['ded_amt']) && $sel6['ded_amt']!=''){ echo $sel6['ded_amt']; } else { echo'0';}?></td>

                            <td id="net<?php echo $count;?>"></td>
                            <td></td>

                        </tr>
                        <?php  $count++;} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>



</body>
</html>

<!-- Datatables -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="vendors/jszip/dist/jszip.min.js"></script>
<script src="vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="vendors/pdfmake/build/vfs_fonts.js"></script>
<!-- Custom Theme Scripts -->
<script>

    $(document).ready(function()
    {window.print()
    });

</script>


<script>

    $( document ).ready(function() {
        var count = $("#count").val();
        for (i =1; i <= count ; i++) {
            num = i;
            var amt = $("#amount" + num).html();
            var general  = $("#general" + num).html();
            var uniform = $("#uniform" + num).html();
            var misc= $("#misc" + num).html();
            var sum  = parseInt(general) + parseInt(uniform)  + parseInt(misc);
            var net  =  parseFloat(amt) -  parseInt(sum);

            $("#net" + i).html(net.toFixed(2));

        }
    });


</script>