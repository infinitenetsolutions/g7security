<?php
include("db.php");
include ("session.php");

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

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include 'sidebar.php';?>

        <!-- top navigation -->
        <?php include 'topbar.php';?>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">

                    </div>


                </div>


                <div class="clearfix"></div>

              
                
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="#">
                        <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Salary <small>Report</small></h2>
                                    <input type="submit" class="btn btn-success pull-right" value="PRINT" name="print"/>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            <th>SL No.</th>
                                            <th>Guard Name</th>
                                            <th>Basic</th>
                                            <th>Basic</th>

                                        </tr>
                                        </thead>


                                        <tbody>
                                        <?php
                                        $sel_data = mysqli_query($conn,"select s.*, e.emp_name from salary_payment s left join emp_data e on s.emp_id = e.id WHERE s.month =  '".$_POST['month']."'");
                                        $count=1;
                                        $number_data = mysqli_num_rows($sel_data);
                                        while($res_data = mysqli_fetch_assoc($sel_data)){
                                            ?>
                                            <tr>
                                                <td><?php echo $count;?></td>
                                                <input type="hidden" id="emp_id" value="<?php echo $res_data['emp_id'];?>">
                                                <input type="hidden" id="month" value="<?php echo $_POST['month'];?>">
                                                <td><?php echo $res_data['emp_name'];?></td>
                                                <td><?php echo $res_data['salary'];?>
                                                </td>
                                                <td>
                                                    <?php if($res_data['payment'] == 1)
                                                    { ?>
                                                        <a href="#" title="status" onclick="UpdateStatus(<?php echo $res_data['id'];?>,'0')" ><button class="view btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span></button></a>
                                                    <?php } else { ?>
                                                        <a href="#" title="status" onclick="UpdateStatus(<?php echo $res_data['id'];?>,'1')"> <button class="view btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button></a>
                                                    <?php } ?>
                                                </td>

                                                <!-- <td><?php echo $res_data['monthly_wage'];?></td> -->
                                            </tr>
                                            <?php  $count++;} ?>


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






<!-- /page content -->

<!-- footer content -->
<?php include 'footer.php';
?>
<!-- /footer content -->

</div>

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!-- NProgress -->
<!-- iCheck -->
<!-- Datatables -->
<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>




</body>
</html>




</body>
</html>


<!-- Custom Theme Scripts -->
<script>

    $(document).ready(function(){init_DataTables()});


    function init_DataTables()
    {
        if(console.log("run_datatables"),"undefined"!=typeof $.fn.DataTable){console.log("init_DataTables");var a=function(){$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({dom:"Blfrtip",buttons:[{extend:"copy",className:"btn-sm"},{extend:"csv",className:"btn-sm"},{extend:"excel",className:"btn-sm"},{extend:"pdfHtml5",className:"btn-sm"},{extend:"print",className:"btn-sm"}],responsive:!0})};TableManageButtons=function(){"use strict";return{init:function(){a()}}}(),$("#datatable").dataTable(),$("#datatable-keytable").DataTable({keys:!0}),$("#datatable-responsive").DataTable(),$("#datatable-scroller").DataTable({ajax:"js/datatables/json/scroller-demo.json",deferRender:!0,scrollY:380,scrollCollapse:!0,scroller:!0}),$("#datatable-fixed-header").DataTable({fixedHeader:!0});var b=$("#datatable-checkbox");b.dataTable({order:[[1,"asc"]],columnDefs:[{orderable:!1,targets:[0]}]}),b.on("draw.dt",function(){$("checkbox input").iCheck({checkboxClass:"icheckbox_flat-green"})}),TableManageButtons.init()}}



</script>


<script>
    function UpdateStatus(id,status)
    {
var month= $("#month").val();
var emp= $("#emp_id").val();
        $.ajax({
            url: 'UpdateStatus.php',
            type: 'POST',
            data: {id: id, status:status, month:month, emp_id:emp},
            success: function (data) {
                               location.reload();
             
            },
            error: function () {

            }
        });
    }

</script>

