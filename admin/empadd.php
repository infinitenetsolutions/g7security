<?php
session_start();
include 'connection/db.php';


if(isset($_POST['submit']))
       // var_dump($_POST['acc_type']);exit();
{


            $targetfolder = "emp_details/";
            $file = rand(0, 99999) .  $_FILES['file']['name'] ;
            if( move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder . $file))
            {
  $insert_package = mysqli_query($dbcon,"INSERT INTO `emp_details`(`id`, `emp_name`, `emp_dept`, `emp_desg`, `emp_salary`, `joining_date`, `address`, `pl`, `cl`, `sl`, `file`, `basic_salary`, `hra`, `ta`, `pay_mode`, `account_no`, `bank_name`, `bank_branch`, `ifsc`, `acc_type`, `cheque_no`, `cheque_date`, `pfno`, `esicno`, `pan`, `adhaar`) VALUES (NULL,'".$_POST['emp_name']."','".$_POST['emp_dept']."','".$_POST['emp_desg']."','".$_POST['emp_salary']."','".$_POST['joining_date']."','".$_POST['address']."','".$_POST['pl']."','".$_POST['cl']."','".$_POST['sl']."','".$file."','".$_POST['basic_salary']."','".$_POST['hra']."','".$_POST['ta']."','".$_POST['pay_mode']."','".$_POST['account_no']."','".$_POST['bank_name']."','".$_POST['bank_branch']."','".$_POST['ifsc']."','".$_POST['acc_type']."','".$_POST['cheque_no']."','".$_POST['cheque_date']."','".$_POST['pfno']."','".$_POST['esicno']."','".$_POST['pan']."','".$_POST['adhaar']."')");

  // print_r("INSERT INTO `emp_details`(`id`, `emp_name`, `emp_dept`, `emp_desg`, `emp_salary`, `joining_date`, `address`, `pl`, `cl`, `sl`, `file`, `basic_salary`, `hra`, `ta`, `pay_mode`, `account_no`, `bank_name`, `bank_branch`, `ifsc`, `acc_type`, `cheque_no`, `cheque_date`, `pfno`, `esicno`, `pan`, `adhaar`) VALUES (NULL,'".$_POST['emp_name']."','".$_POST['emp_dept']."','".$_POST['emp_desg']."','".$_POST['emp_salary']."','".$_POST['joining_date']."','".$_POST['address']."','".$_POST['pl']."','".$_POST['cl']."','".$_POST['sl']."','".$file."','".$_POST['basic_salary']."','".$_POST['hra']."','".$_POST['ta']."','".$_POST['pay_mode']."','".$_POST['account_no']."','".$_POST['bank_name']."','".$_POST['bank_branch']."','".$_POST['ifsc']."','".$_POST['acc_type']."','".$_POST['cheque_no']."','".$_POST['cheque_date']."','".$_POST['pfno']."','".$_POST['esicno']."','".$_POST['pan']."','".$_POST['adhaar']."')");();
  header('location:emplist.php');
  

}


    
   
}


$sel_package = mysqli_query($dbcon, "select * from emp_details");
$result = mysqli_fetch_assoc($sel_package);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

  </head><?php
      include 'include/topbar.php';
      ?>

      <!-- Left side column. contains the logo and sidebar -->
       <?php
      include 'include/header.php';
      ?>
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Contact Managment
            <small>Preview</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-offset-1 col-md-10">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Employee Management</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
             <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Employee Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Emploayee Name" name="emp_name" maxlength="10">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Department</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Department"  required="required" name="emp_dept">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Designation</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Designation" name="emp_desg"    >
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Salary" required="required" name="emp_salary">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Joining Date</label>
                <div class="col-sm-8">
                    <input type="Date" class="form-control" id="inputEmail3" placeholder="Joining Date" required="required" name="joining_date" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Address" required="required" name="address"  >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Paid Leave</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Paid Leave" required="required" name="pl" >
                  </div>
                </div>

                 <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Casual Leave</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Casual Leave" required="required" name="cl">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Sick Leave</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Sick Leave" required="required" name="sl">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Address" required="required" name="address">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Basic Salary</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Basic Salary" required="required" name="basic_salary">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">H.R.A</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="H.R.A" required="required" name="hra">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">T.A</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="T.A" required="required" name="ta">
                  </div>
                </div>

                

                <div class="form-group">
                        <label class="col-sm-3 control-label">Payment Mode<span class="required">*</span></label>
                        <div class="col-sm-8">
                          <select id="pay_mode" name="pay_mode" id="pay_mode" onchange="show_data(this.value)">
                            <option value="0" selected="selected">--Select--</option>
                            <option value="cash">Cash</option>
                            <option value="cheque">Cheque/DD</option>
                            <option value="transfer">NEFT/RTGS/Bank Transfer/</option>
                        </select>
                        </div>
                      </div>

                      <div id="data">
                        
                      </div>

             

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">P.F. no</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="P.F. no" required="required" name="pfno">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Esic  No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Esic  No." required="required" name="esicno">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">PAN</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="PAN" required="required" name="pan">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Adhaar No.</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Adhaar No." required="required" name="adhaar">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Photo</label>
                <div class="col-sm-8">
                    <input type="file" onchange="readURL(this);" class="form-control" id="imgInp" placeholder="Photo" required="required" name="file" width="100px" height="100px" >
                     <img id="blah" width="100px" height="100px" src="emp_details"></div>
                   </div>

                




                
                
                </div>


              
              <!-- /.box-body -->
              <div class="box-footer">
               <input type="submit" class="btn btn-info btn-warning" name="submit" value="Submit"/>
              </div>
              <!-- /.box-footer -->
            </form>
              </div><!-- /.box -->

            
            </div><!--/.col (left) -->
            <!-- right column -->
           </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
       <?php 
      include 'include/footer.php';
      ?>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js" type="text/javascript"></script>
     <script type="text/javascript">
    function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>

<script>

    function show_data(mode)
    {
        $.ajax({
            url: 'details.php',
            type: 'POST',
            data: {pay_mode: mode},
            success: function (data) {
                $("#data").html(data);
            },
        });
    }
</script>
  </body>
</html>
<?php
?>
