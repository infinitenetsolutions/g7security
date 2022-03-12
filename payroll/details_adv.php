<?php
include("db.php");
include ("session.php");
?>


<div class="modal-header" >
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title" id="myModalLabel2">Advance details</h4>
</div>

<div class="modal-body" style="overflow: auto; height: 300px;">

    <table class="table table-striped table-bordered" >
        <thead>
        <tr>
            <th>Sl no</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Paid For</th>

        </tr>
        </thead>


        <tbody >
        <?php
        $se = mysqli_query($conn,"select * from adv_details where advance_type='".$_POST['type']."' AND emp_name='".$_POST['e_id']."' ");
        $count=1;
       while ($row = mysqli_fetch_array($se))
        {
            ?>
            <tr>
                <td><?php echo $count;?></td>
                <td><?php echo $row['date'];?></td>
                <td><?php echo $row['amount'];?></td>
                <td><?php echo $row['paid_for'];?></td>

            </tr>
            <?php  $count++; } ?>

        </tbody></table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>



