<?php if($_POST['mode'] == 'Cheque')
{
    ?>
    <table class="table table-bordered" >
        <tr>
        <th>Cheque Date:</th>
        <td><input type="date" name="cheque_date" style="width:80px;" value="<?php if(isset($bill_billing['cheque_date'])) { echo $bill_billing['cheque_date'];} else{ echo '';}?>"></td>
    </tr>
    <tr>
        <th>Cheque Number:</th>
        <td><input type="text" name="cheque_no" style="width:80px;" value="<?php if(isset($bill_billing['cheque_no'])) { echo $bill_billing['cheque_no'];} else{ echo '';}?>"></td>
    </tr>
    <tr>
        <th>Bank Name:</th>
        <td><input type="text" name="bank_name" style="width:80px;" value="<?php if(isset($bill_billing['bank_name'])) { echo $bill_billing['bank_name'];} else{ echo '';}?>"></td>
    </tr>
    <tr>
        <th>Bank Branch:</th>
        <td><input type="text" name="bank_branch" style="width:80px;" value="<?php if(isset($bill_billing['bank_branch'])) { echo $bill_billing['bank_branch'];} else{ echo '';}?>"></td>
    </tr>
    </table>
<?php } if($_POST['mode'] == 'Transfer')
{
?>
<table class="table table-bordered" >
    <tr>
    <th>A/C no:</th>
    <td><input type="text" name="acc_no" style="width:80px;" value="<?php if(isset($bill_billing['acc_no'])) { echo $bill_billing['acc_no'];} else{ echo '';}?>"></td>
</tr>
<tr>
    <th>IFSC Code:</th>
    <td><input type="text" name="ifsc" style="width:80px;" value="<?php if(isset($bill_billing['ifsc'])) { echo $bill_billing['ifsc'];} else{ echo '';}?>"></td>
</tr>
<tr>
    <th>Tran no:</th>
    <td><input type="text" name="tran_no" style="width:80px;" value="<?php if(isset($bill_billing['tran_no'])) { echo $bill_billing['tran_no'];} else{ echo '';}?>"></td>
</tr>
<tr>
    <th>Tran date:</th>
    <td><input type="date" name="tran_date" style="width:80px;" value="<?php if(isset($bill_billing['tran_date'])) { echo $bill_billing['tran_date'];} else{ echo '';}?>"></td>
</tr>
    </table>
<?php } ?>
