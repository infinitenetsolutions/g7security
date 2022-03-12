<?php
include("db.php");
include ("session.php");
$count_emp = mysqli_query($conn,"select count(id) as eid FROM emp_data");
$emp_no = mysqli_fetch_array($count_emp);
if(isset($_POST['submit']))
{
    
//echo "sdnfbcsdncbsdnbcndscbsdn"; exit;
$emp_number = $emp_no['eid'];
$k = 1;
for (; $k <= $emp_number; $k++) {

            $emp_id ='emp_id' . $k;
            $wage ='wage' . $k;
            $total ='total_amt' . $k;
            $working = 'working_days' . $k;
            $monthly_wage = 'monthly_wage' . $k;
if ($_REQUEST[$working] != '' && !is_null($_REQUEST[$working])) {


$ins_data= mysqli_query($conn,"INSERT INTO `attendance`(`month`, `company_id`, `emp_id`, `no_of_days`, `wage_perday`,`monthly_wage`,`total_amt`) VALUES ('".$_REQUEST['month']."','".$_REQUEST['cname']."','".$_REQUEST[$emp_id]."','".$_REQUEST[$working]."','".$_REQUEST[$wage]."','".$_REQUEST[$monthly_wage]."','".$_REQUEST[$total]."')");
}
 }

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ATTENDANCE</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->

   <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
    <link rel="stylesheet" href="vendors/ajax.min.css" type="text/css" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
     <?php include 'sidebar.php';?>

        <!-- top navigation -->
       <!-- /topbar menu -->
        <?php include("topbar.php");?>
        <!-- /topbar menu -->
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                
              </div>

              
            </div>


            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    
                    <h2>ATTENDANCE <small>DETAIILS</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">

                      

                      
                      
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT MONTH</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="month" name="month" class="form-control col-md-7 col-xs-12" id="month" required="required" >

                    </div>
                  </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">SELECT COMPANY</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="company" id="auto" class="form-control col-md-7 col-xs-12" onchange="mywage()">

                            </div>
                        </div>
                  </div>
                </div>
              </div>
            </div>

<div id="showForm">
</div>

                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      
            
      
        

        <!-- /page content -->

        <!-- footer content -->
        <?php include("footer.php");?>
        <!-- /footer content -->
      </div>
    </div>


    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
  
   
    <!-- Datatables -->
    <script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="vendors/jszip/dist/jszip.min.js"></script>
    <script src="vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

    <script type="text/javascript">
        function mywage()
        {
            var cname=$("#auto").val();
            var month=$("#month").val();
            var dname=$("#designation").val();
            $.ajax({
                url: 'showform.php',
                type: 'POST',
                data: {cname: cname,dname:dname,month:month},
                success: function (data) {
                    $("#showForm").html(data);
                },
            });
        }
    </script>
    <script src="js/google-autocomplete.js"></script>
    
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript">
    $(function() {

        //autocomplete
        $("#auto").autocomplete({
            source: "search_company.php",
            minLength: 1
        });

    });
    </script>



  </body>
</html>