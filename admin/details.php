<?php if($_POST['pay_mode'] == 'cash')
{
?>
<div class="form-group">
    
   
</div>


<?php } if($_POST['pay_mode'] == 'cheque') {?>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cheque No./DD no.<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="cheque_no">
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Cheque/DD date<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="cheque_date">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Name<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="bank_name">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Bank Branch<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="bank_branch">
    </div>
</div>
<?php } if($_POST['pay_mode'] == 'transfer') {?>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Account Type<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select id="acc_type" name="acc_type">
                            <option value="0" selected="selected">--Select--</option>
                            <option value="savings">S/B(Savings)</option>
                            <option value="current">C/A(Current)</option>
                            
                        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Account no<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
         <input type="text" class="form-control" id="inputEmail3" placeholder="account no" required="required" name="account_no">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">IFSC code<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
         <input type="text" class="form-control" id="inputEmail3" placeholder="ifsc" required="required" name="ifsc">
    </div>
</div>


<?php } ?>