<?php



$date = $_POST['month'];

$date = date_create($date);
$date_formate = date_format($date, "Y-m");
 $date_month = date_format($date, "m");
 $date_year = date_format($date, "Y");


$number = cal_days_in_month(CAL_GREGORIAN, $date_month, $date_year); // 31
?>

<?php include("db.php");?>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
    <input type="hidden" name="cname" value="<?php echo $_POST['cname'];?>">
    <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>ATTENDANCE</small></h2>



            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr>
                    <th>SL NO.</th>
                    


                    <th>Employee Name</th>
                    <th>Days of working</th>
                    <th>Wage per day</th>
                    <th>Amount</th>
                </tr>
                </thead>





                <tbody>
                <?php  $query = "select * FROM emp_data";

                $count=1;
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result))

                {
                        ?>
                    <tr>
                        <input type="hidden" name="count" value="<?php echo $count;?>" >
                        <td><?php echo $count;?></td>
                        

                        <td><?php echo $row['emp_name'];?>
                            <input type="hidden" name="emp_id<?php echo $count;?>" value="<?php echo $row["id"];?>"></td>
                            <input type="hidden" id="designation<?php echo $count;?>" name="designation<?php echo $count;?>" value="<?php echo $row["designation"];?>"></td>

                        <td><input type="text" id="working<?php echo $count;?>" name="working_days<?php echo $count;?>" class="form-control" onkeyup="calculateTotal(this.value,<?php echo $count;?>)"></td>
                      <?php
                      $sel_w = mysqli_fetch_assoc(mysqli_query($conn,"select wages from wages where company = '".$_POST['cname']."' AND desig = '".$row['designation']."'"));
                       ?>
                         <td><input readonly type="text" class="form-control" name="wage<?php echo $count;?>" id="wage<?php echo $count;?>" value="<?php echo number_format(($sel_w['wages']/$number),2);?>"></td>

                        <td><input readonly type="text" class="form-control" name="total_amt<?php echo $count;?>" id="demo<?php echo $count;?>" value=""></td>

                        <input type="hidden" name="monthly_wage<?php echo $count;?>" value="<?php echo $sel_w['wages'];?>">


                    </tr>
                    <?php $count++;

                }
                ?>
                </tbody>
            </table>

            <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                    <input type="submit" class="btn btn-success" name="submit"/>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

<script>
    $("#checkAl").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
</script>


</body>
</html>
<!--calculation start-->
<script type="text/javascript">

    function calculateTotal(str,val)
    {
        var x = document.getElementById("working" + val).value;
        var y = document.getElementById("wage" + val).value;
        var z = x*y;
        document.getElementById("demo" + val).value = z;
    }
</script>
<!--calculation end-->
<script type="text/javascript">
    $(".parent").each(function(index){
        var group = $(this).data("group");
        var parent = $(this);

        parent.change(function(){  //"select all" change
            $(group).prop('checked', parent.prop("checked"));
        });
        $(group).change(function(){
            parent.prop('checked', false);
            if ($(group+':checked').length == $(group).length ){
                parent.prop('checked', true);
            }
        });
    });
</script>
<!-- jQuery -->

<!-- Custom Theme Scripts -->
<script>

    $(document).ready(function(){init_DataTables()});


    function init_DataTables()
    {
        if(console.log("run_datatables"),"undefined"!=typeof $.fn.DataTable){console.log("init_DataTables");var a=function(){$("#datatable-buttons").length&&$("#datatable-buttons").DataTable({dom:"Blfrtip",buttons:[{extend:"copy",className:"btn-sm"},{extend:"csv",className:"btn-sm"},{extend:"excel",className:"btn-sm"},{extend:"pdfHtml5",className:"btn-sm"},{extend:"print",className:"btn-sm"}],responsive:!0})};TableManageButtons=function(){"use strict";return{init:function(){a()}}}(),$("#datatable").dataTable(),$("#datatable-keytable").DataTable({keys:!0}),$("#datatable-responsive").DataTable(),$("#datatable-scroller").DataTable({ajax:"js/datatables/json/scroller-demo.json",deferRender:!0,scrollY:380,scrollCollapse:!0,scroller:!0}),$("#datatable-fixed-header").DataTable({fixedHeader:!0});var b=$("#datatable-checkbox");b.dataTable({order:[[1,"asc"]],columnDefs:[{orderable:!1,targets:[0]}]}),b.on("draw.dt",function(){$("checkbox input").iCheck({checkboxClass:"icheckbox_flat-green"})}),TableManageButtons.init()}}

</script>