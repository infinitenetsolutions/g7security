<?php
include("db.php");
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
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>


<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Attendance For the month of <?php echo date(" F, Y", strtotime($_POST['month']));   ?></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">


                <?php if($_POST['type'] == 'e') { ?>


                    <table id="filterme" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Guard Name</th>
                            <th>Party Name</th>
                            <th>Total Days</th>
                            <th>Basic</th>
                            <th>Amount</th>
                        </tr>
                        </thead>


                        <tbody>

                        <?php
                        $sel_data1 = mysqli_query($conn,"select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."' GROUP BY a.emp_id");
                        while($res_data1 = mysqli_fetch_assoc($sel_data1)){
                            ?>

                            <tr style="background-color:#ededed; font-weight: 900">

                                <td >
                                    <?php echo $res_data1['emp_name'];?>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    $sel_data2 = mysqli_query($conn,"select SUM(no_of_days) as t_days, SUM(total_amt) as t_amt from attendance where `emp_id`= '".$res_data1['emp_id']."' AND month =  '".$_POST['month']."'");
                                    $res_data2 = mysqli_fetch_assoc($sel_data2);
                                    echo $res_data2['t_days'];
                                    ?>
                                </td>
                                <td></td>

                                <td>
                                    <?php echo number_format($res_data2['t_amt'],2);?>
                                </td>
                            </tr>
                            <?php
                            $sel_data = mysqli_query($conn,"select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."' AND a.emp_id = '".$res_data1['emp_id']."'");
                            while($res_data = mysqli_fetch_assoc($sel_data)){
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $res_data['company_name'];?></td>
                                    <td><?php echo $res_data['no_of_days'];?></td>
                                    <td><?php echo $res_data['monthly_wage'];?></td>
                                    <td><?php echo $res_data['total_amt'];?></td>

                                </tr>
                            <?php } ?>

                        <?php } ?>


                        </tbody>
                    </table>

                <?php } else if($_POST['type'] == 'c'){?>
                    <table id="filterme" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Party Name</th>
                            <th>Guard Name</th>
                            <th>Total Days</th>
                            <th>Basic</th>
                            <th>Amount</th>
                        </tr>
                        </thead>


                        <tbody>

                        <?php
                        $sel_data1 = mysqli_query($conn,"select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."' GROUP BY a.company_id");
                        while($res_data1 = mysqli_fetch_assoc($sel_data1)){
                            ?>

                            <tr style="background-color:#ededed; font-weight: 900">

                                <td >
                                    <?php echo $res_data1['company_name'];?></strong>
                                </td>
                                <td></td>
                                <td>
                                    <?php
                                    $sel_data2 = mysqli_query($conn,"select SUM(no_of_days) as t_days, SUM(total_amt) as t_amt from attendance where `company_id`= '".$res_data1['company_id']."' AND month =  '".$_POST['month']."'");
                                    $res_data2 = mysqli_fetch_assoc($sel_data2);
                                    echo $res_data2['t_days'];
                                    ?>
                                </td>
                                <td></td>

                                <td>
                                    <?php echo number_format($res_data2['t_amt'],2);?>
                                </td>
                            </tr>




                            <?php
                            $sel_data = mysqli_query($conn,"select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."' AND a.company_id = '".$res_data1['company_id']."'");
                            while($res_data = mysqli_fetch_assoc($sel_data)){
                                ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $res_data['emp_name'];?></td>
                                    <td><?php echo $res_data['no_of_days'];?></td>
                                    <td><?php echo $res_data['monthly_wage'];?></td>
                                    <td><?php echo $res_data['total_amt'];?></td>

                                </tr>
                            <?php } ?>

                        <?php } ?>


                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
</form>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script>window.onload = function() {
        window.print();
};
</script>


<!-- Datatables -->
