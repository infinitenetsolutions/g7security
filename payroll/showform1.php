<?php

$date = $_POST['month'];

$date = date_create($date);
$date_formate = date_format($date, "Y-m");
 $date_month = date_format($date, "m");
 $date_year = date_format($date, "Y");


$number = cal_days_in_month(CAL_GREGORIAN, $date_month, $date_year); // 31
?>



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATTENDANCE</title>

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
</head>
<?php include("db.php");?>
 <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
    <input type="hidden" name="cname" value="<?php echo $_POST['cname'];?>" id="c_name">
    <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>ATTENDANCE</small></h2>



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
                    <th>SL NO.</th>
                    <th>Employee Name</th>
                    <th>Designation</th>
                    <th>Wage per day</th>
                    <th>Days of working</th>
                    <th>Amount</th>
                </tr>
                </thead>
                <tbody>
                <?php  $query = "select * FROM emp_data";

                $count=1;
                $result = mysqli_query($conn,$query);
                while ($row = mysqli_fetch_array($result))
                     {
                        $j_query=mysqli_query($conn,"select * from attendance where emp_id='".$row['id']."' AND month='".$_POST['month']."' AND company_id= '".$_POST['cname']."'");

                        if(mysqli_num_rows($j_query ) > 0 ) {
                        }
                        else {

                            ?>
                            <tr>
                                <input type="hidden" name="count" value="<?php echo $count; ?>">
                                <td><?php echo $count; ?></td>


                                <td><?php echo $row['emp_name']; ?>
                                    <input type="hidden" name="emp_id<?php echo $count; ?>"
                                           value="<?php echo $row["id"]; ?>"></td>
                                <input type="hidden" id="no_of_days" value="<?php echo $number; ?>"></td>

                                <td><select id="designation_sel<?php echo $count; ?>"
                                            name="designation_sel<?php echo $count; ?>" class="form-control"
                                            onchange="selectwage(this.value, <?php echo $count; ?>)">
                                        <option>Select designation</option>
                                        <?php
                                        $sel_d = mysqli_query($conn, "select id,designation from designation");
                                        while ($res_desg = mysqli_fetch_assoc($sel_d)) {
                                            ?>
                                            <option
                                                value="<?php echo $res_desg['id']; ?>"><?php echo $res_desg['designation']; ?></option>

                                        <?php } ?>
                                </td>
                                <td><input readonly type="text" class="form-control" name="wage<?php echo $count; ?>"
                                           id="wage<?php echo $count; ?>" value=""></td>
                                <td><input type="text" id="working<?php echo $count; ?>"
                                           name="working_days<?php echo $count; ?>" class="form-control"
                                           onkeyup="calculateTotal(this.value,<?php echo $count; ?>)"></td>
                                <td><input readonly type="text" class="form-control"
                                           name="total_amt<?php echo $count; ?>" id="demo<?php echo $count; ?>"
                                           value=""></td>

                                <input type="hidden" id="monthly_wage<?php echo $count; ?>"
                                       name="monthly_wage<?php echo $count; ?>" value="">
                            </tr>
                            <?php $count++;
                        }
                }
                ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
</form>

</body>
</html>
<!--calculation start-->
<script type="text/javascript">

    function calculateTotal(str,val)
    {
        var x = $("#working" + val).val();
        var y = $("#wage" + val).val();
        var z = x*y;
        $("#demo" + val).val(Number(z).toFixed(2));
    }
</script>



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


<!--calculation end-->
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