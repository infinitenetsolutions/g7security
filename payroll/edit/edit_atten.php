<?php
include("db.php");
//var_dump($_POST);exit();
$date = $_POST['month'];
$company=$_POST['cname'];

$date = date_create($date);
$date_formate = date_format($date, "Y-m");
 $date_month = date_format($date, "m");
 $date_year = date_format($date, "Y");


$number = cal_days_in_month(CAL_GREGORIAN, $date_month, $date_year); 
// 31



    $sel_data=mysqli_query($conn,"select a.id,a.company_id, a.month, a.no_of_days, a.wage_perday, a.monthly_wage, a.total_amt, e.emp_name from attendance a left join emp_data e on a.emp_id=e.id where a.company_id='".$company."' AND a.month='".$_POST['month']."'");
    //$res_data=mysqli_fetch_assoc($sel_data);


?>

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
           
             <label class="control-labe">Search</label>  <input id="inputfilter" type="text" style="border-radius: 9px; width: 300px; height: 40px; font-size: 15px;"/>

           <input type="submit" class="btn btn-success col-md-offset-6" name="submit"/>
          </div>
</div>
            <table id="filterme" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

                <thead>
                <tr>
                   
                    


                   <th>SL NO.</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Wages Per day</th>
                    <th>Days of working</th>
                    <th>Amount</th>
                </tr>
                </thead>





                <tbody>
                <?php 
                 $count=1;
                while ($row = mysqli_fetch_array($sel_data))

                {
                        ?>
                    
                        
                    <tr>
                        <input type="hidden" name="count" value="<?php echo $count;?>" >
                        <td><?php echo $count;?></td>


                        <td><?php echo $row['emp_name'];?>
                            <input type="hidden" name="emp_id<?php echo $count;?>" value="<?php echo $row["id"];?>"></td>
                            <input type="hidden" id="no_of_days" value="<?php echo $number;?>"></td>

                         <td><select id="designation_sel<?php echo $count;?>" name="designation_sel<?php echo $count;?>" class="form-control" onchange="selectwage(this.value, <?php echo $count; ?>)">
                     <option>Select designation</option>
                        <?php
                        $sel_d = mysqli_query($conn,"select id,designation from designation");
                         while($res_desg = mysqli_fetch_assoc($sel_d))
                         {
                                ?>
                                <option value="<?php echo $res_desg['id'];?>"><?php echo $res_desg['designation'];?></option>

                       <?php } ?>
                        </td>
                         <td><input readonly type="text" class="form-control" name="wage<?php echo $count;?>" id="wage<?php echo $count;?>" value="<?php echo $row['wage_perday'];?>"></td>
                        <td><input type="text" id="working<?php echo $count;?>" name="working_days<?php echo $count;?>" class="form-control" value="<?php echo $row["no_of_days"];?>" onkeyup="calculateTotal(this.value,<?php echo $count;?>)"></td>
                        <td><input readonly type="text" class="form-control" name="total_amt<?php echo $count;?>" id="demo<?php echo $count;?>" value="<?php echo $row["total_amt"];?>"></td>

                        <input type="hidden" id="monthly_wage<?php echo $count;?>" name="monthly_wage<?php echo $count;?>" value="<?php echo $row['monthly_wage'];?>">
                    
                    <?php $count++;

                }
                ?>
                </tbody>
            </table>

            
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
<script>
    function myFunction(id)
    {
        var r=confirm("Are you sure you want to delete this record?");
        if (r==true)
        {
            window.location.assign("delete_attendance.php?id="+ id);
        }
    }
</script>
<!-- jQuery -->

<!-- Custom Theme Scripts -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
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
    function selectwage(desg, val) {
       var c_name =  $("#c_name").val();
       var no_of_days =  $("#no_of_days").val();

        $.ajax({
            url: 'showwageamt.php',
            type: 'POST',
            data: {desg: desg, val:val, c_name:c_name, no_of_days:no_of_days },
            dataType:'JSON',
            success: function (data) {
                $("#wage" + val).val(data.wage_s);
                $("#monthly_wage" + val).val(data.wage);
            },
        });

    }


</script>