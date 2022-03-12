<?php include("db.php");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Salary sheet for the month of <?php echo  date("F Y", strtotime($_REQUEST['month']));?></title>


    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->

    <link href="build/css/custom.min.css" rel="stylesheet">
</head>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" target="_blank" action="print_salary.php">

    <input type="hidden" name="month" id="month" value="<?php echo $_POST['month'];?>">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Balance <small>Report</small></h2>
                <!--<input type="submit" class="btn btn-success pull-right" value="PRINT" name="print"/>-->
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                    <tr>
<th>Sl no</th>
                        <th>Date</th>
                        <th>Debit</th>
                        <th>cradit</th>
                        <th>Balance</th>
                    </tr>
                    </thead>


                    <tbody>
                    <?php
                    $sel_salary = mysqli_query($conn,"select * from balance_sheet where date_format(date,'%Y-%m') =  '".$_POST['month']."' ORDER BY CONVERT(Date, date)  ASC");

                    $orderdate = explode('-', $_POST['month']);
                    $year= $orderdate[0];
                    $month = $orderdate[1];


                    $Prv_year = $orderdate[0] - 1;
                    $Prv_month = 12;

                    if($month == 01)
                    {
                        $Prv_year = $orderdate[0] - 1;
                        $Prv_month = 12;
                        $date_use = "$Prv_year-$Prv_month";

                    }
                    else {
                        $Prv_year = $orderdate[0];
                        $Prv_month = $orderdate[1] - 1;

                      if($Prv_month <= '9')
                      {
                        $date_use = "$Prv_year-0$Prv_month";
                    }
                    else
                        {
                            $date_use = "$Prv_year-$Prv_month";
                        }
                    }

                    $sel_bal = mysqli_query($conn,"select * from balance WHERE date_format(month,'%Y-%m') = '".$date_use."' ");
                    
                    if(mysqli_num_rows($sel_bal > 0))
                    {
                    
                  $data_bal =  mysqli_fetch_assoc($sel_bal);
                    $bal =$data_bal['amount'];
                    }else
                    {
                        $sel_bal_initial = mysqli_fetch_assoc(mysqli_query($conn,"select * from balance"));   
                         $bal =$sel_bal_initial['amount']; 
                    }
                    $cnt = 1;
               while($res_data = mysqli_fetch_assoc($sel_salary)){
                    if($res_data['type'] == 'debit') {
                        $bal = $bal - $res_data['amount'];
                    }elseif ($res_data['type'] == 'cradit')
                    {
                        $bal = $bal + $res_data['amount'];
                    }

                        ?>
                    <tr>
                        <td><?php echo $cnt;?></td>
                        <td data-field-type="date">
                            <?php echo $res_data['date'];?></td>
                        <td><?php if($res_data['type'] == 'debit') { echo $res_data['amount']; } else { echo'';}?></td>
                        <td><?php if($res_data['type'] == 'cradit') { echo $res_data['amount']; } else { echo'';}?></td>
                        <td><?php if($res_data['type'] == 'debit') { echo $bal; } elseif ($res_data['type'] == 'cradit') { echo $bal; }?></td>

                    </tr>
                    <?php $cnt++;
                   $bal; }?>
<input type="hidden" value="<?php echo $cnt;?>" id="count">
<input type="hidden" value="<?php echo $bal;?>" id="balance_amt">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>



</body>
</html>


<!-- Custom Theme Scripts -->
<script>

    $(document).ready(function()
    {
        init_DataTables();
          var count = $("#count").val();
        var bal = $("#balance_amt").val();
        var month = $("#month").val();
        $.ajax({
            url: 'update_bal.php',
            type: 'POST',
            data: {month:month, bal:bal, count:count},
            success: function (data) {
            },
        });
    }



    );


    function init_DataTables()
    {
        if(console.log("run_datatables"),"undefined"!=typeof $.fn.DataTable){console.log("init_DataTables");var a=function(){$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({dom:"Blfrtip",buttons:[{extend:"copy",className:"btn-sm"},{extend:"csv",className:"btn-sm"},{extend:"excel",className:"btn-sm"},{extend:"pdfHtml5",className:"btn-sm"},{extend:"print",className:"btn-sm"}],responsive:!0})};TableManageButtons=function(){"use strict";return{init:function(){a()}}}(),$("#datatable").dataTable(),$("#datatable-keytable").DataTable({keys:!0}),$("#datatable-responsive").DataTable(),$("#datatable-scroller").DataTable({ajax:"js/datatables/json/scroller-demo.json",deferRender:!0,scrollY:380,scrollCollapse:!0,scroller:!0}),$("#datatable-fixed-header").DataTable({fixedHeader:!0});var b=$("#datatable-checkbox");b.dataTable({order:[[1,"asc"]],columnDefs:[{orderable:!1,targets:[0]}]}),b.on("draw.dt",function(){$("checkbox input").iCheck({checkboxClass:"icheckbox_flat-green"})}),TableManageButtons.init()}}



</script>

