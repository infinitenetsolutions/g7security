<?php if($_POST['mode'] == '1')
{
?>
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Total amount<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="uniform_amount">
    </div>
</div>
<?php } if($_POST['mode'] == '2') {?>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount to be deduct every month<span class="required">*</span>
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" name="uniform_amount">
    </div>
</div>
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount to be deduct from month<span class="required">*</span>
        </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input class="date-picker form-control col-md-7 col-xs-12" required="required" type="date" name="uniform_amount_from">
        </div>
    </div>

<?php } if($_POST['mode'] == '3') {?>

<div class="form-group">
    <label class="control-label col-md-7 col-sm-7 col-xs-12">Add the uniform charges in advance section<span class="required">*</span>
    </label>
</div>
<?php } ?>