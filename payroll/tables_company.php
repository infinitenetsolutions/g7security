<?php
include("db.php");
include ("session.php");
  
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/logo.png" type="image/ico" />

    <title>DataTables |COMPANY</title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
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
                      <ul class="nav navbar-right panel_toolbar">
                        <li> <a href="company_form.php"><button type="button" class="btn btn-success">ADD COMPANY</button></a></li>
                    </ul>
                    <h2>COMPANY  <small>DETAILS</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 30PX;">SL NO.</th>
                          <th>Company Name</th>
                          <th>Company Address</th>
                          <th>Contact Person Name</th>
                          <th>Contact Person Number</th>
                          <th>Area</th>
                          <th>GSTIN</th>
                          
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                        <?php 
$query = "select * FROM company";
$count=1;
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($result))
{
                        Print "<tr>";
                        Print '<td align="center">'. $count . "</td>";
                        Print '<td align="center">'. $row['company_name'] . "</td>";
                        Print '<td align="center">'. $row['company_address'] . "</td>";
                        Print '<td align="center">'. $row['contact_per_name'] . "</td>";
                        Print '<td align="center">'. $row['contact_per_add'] . "</td>";
                        Print '<td align="center">'. $row['area'] . "</td>";
                        Print '<td align="center">'. $row['gstin'] . "</td>";
                        
                        Print '<td align="center">'; 
                        Print '<a href="update.php?id='. $row['id'] .'"><img src="images/edit.png" title="EDIT" alt="EDIT" height="25" width="25"></a>';
                        Print '<a href="#" onclick="myFunction('.$row['id'].')"><img src="images/delete.png" title="DELETE"  alt="Delete" height="25" width="25"></a> </td>';

                        Print "</tr>";
                        $count++;

                }
            ?>
                          </tbody>
                    </table>
                  </div>
                </div>
              </div>
                       
                       
                       
                        
                        
                        
                        
                       
                        
                      
                    

            
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
<script>
            function myFunction(id)
            {
            var r=confirm("Are you sure you want to delete this record?");
            if (r==true)
              {
                window.location.assign("delete.php?id="+ id);
              }
            }
        </script>
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
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="vendors/iCheck/icheck.min.js"></script>
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

  </body>
</html>