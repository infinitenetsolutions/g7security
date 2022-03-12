
<?php include("db.php");?>
<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="print_report.php" target="_blank">
    <input type="hidden" name="type" value="<?php echo $_POST['type'];?>">
    <input type="hidden" name="month" value="<?php echo $_POST['month'];?>">

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Attendance <small>Report</small></h2>

                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <label class="control-labe">Search</label>  <input id="inputfilter" type="text" style="border-radius: 9px; width: 300px; height: 40px; font-size: 15px;"/>

                <input type="submit" class="btn btn-primary col-md-offset-6" name="submit" value="PRINT"/>

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
                        //$sel_data1 = mysqli_query($conn,"select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."'");
                       
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
                      //     var_dump("select a.*, c.company_name, e.emp_name from attendance a left join company c on a.company_id = c.id left join emp_data e on a.emp_id = e.id where month = '".$_POST['month']."' AND a.company_id = '".$res_data1['company_id']."'");
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


<!-- Datatables -->
