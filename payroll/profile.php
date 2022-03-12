<?php
//include("db.php");
//include ("session.php");
//if(isset($_GET['id']))
//{
//    $sel_data=mysqli_query($conn,"select e.id,e.emp_name,e.photo,e.resume,e.blood_grp,e.guardian_name,e.joining_date,e.guardian_no,e.address,e.mob_no,d.designation from emp_data e left join designation d on e.designation=d.id where e.id='".$_GET['id']."'");
//    $res_data=mysqli_fetch_assoc($sel_data);
//}
?>

<?php
include'db.php';
include ("session.php");
if(isset($_GET['id']))
{
    $sel_data=mysqli_query($conn,"select * from emp_data where id='".$_GET['id']."'");
    $res_data=mysqli_fetch_assoc($sel_data);
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
     <link rel="icon" href="images/logo.png" type="image/ico" />

    <title>PROFILE! | </title>

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        
            
             <?php include("sidebar.php");?>
           

            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
         


        <!-- top navigation -->
        <?php include('topbar.php');?>
        
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Employee Profile</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                 
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Employee  <small>Profile</small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                      <div class="profile_img">
                        <div id="crop-avatar">
                          <!-- Current avatar -->
                          <?php if($res_data['photo']!=NULL)
                          {?>
                          <img class="img-responsive avatar-view" style="width: 200px;" src="<?php if(isset($_GET['id'])){?>upload/<?php echo $res_data['photo'];}?>"">
                          <?php }
                          else
                          {
                            ?>
                            <img class="img-responsive avatar-view" style="width: 200px;" src="images/default.jpg">
                            <?php } ?>
                        </div>
                      </div>
                      <h3><?php if(isset($_GET['id'])){ echo $res_data['emp_name'];}?></h3>

                      <ul class="list-unstyled user_data">
                        <li><i class="fa fa-map-marker user-profile-icon"></i> <?php if(isset($_GET['id'])){ echo $res_data['address'];}?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php if(isset($_GET['id'])){ echo $res_data['designation'];}?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-external-link user-profile-icon"></i>
                          <?php if(isset($_GET['id'])){ echo $res_data['mob_no'];}?>
                        </li>
                      </ul>

                      <a class="btn btn-success" href="emp_edit.php?id=<?php if(isset($_GET['id'])){ echo $res_data['id'];}?>"> <i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />

                      
                      <!-- end of skills -->

                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">

                      <div class="profile_title">
                        <div class="col-md-6">
                          <h2>Employee Details</h2>

                        </div>
                        <div class="col-md-6">
                          
                          </div>
                        </div>
                      </div>
                      

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Employee Name:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input class="form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $res_data['emp_name'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Address:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class=" form-control col-md-7 col-xs-12" readonly="readonly" name="emp_address" value="<?php echo $res_data['address'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Joining Date:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class=" form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $res_data['joining_date'];?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Mobile No:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <input  class=" form-control col-md-7 col-xs-12" readonly="readonly" value="<?php echo $res_data['mob_no'];?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Blood Group
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <input  class=" form-control col-md-7 col-xs-12"  readonly="readonly"  value="<?php echo $res_data['blood_grp'];?>"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Guardian's Name:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <input  class=" form-control col-md-7 col-xs-12"  readonly="readonly" value="<?php echo $res_data['guardian_name'];?>"> 
                                        </div>
                                    </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Guardian's Contact No:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <input  class=" form-control col-md-7 col-xs-12"  readonly="readonly" value="<?php echo $res_data['guardian_no'];?>"> 
                                            </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Resume:
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                         <a href="upload/<?php echo  $res_data['resume'];?>">DOWNLOAD</a>
                                            </div>

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

        <!-- footer content -->
        <?php include ('footer.php');?>
        <!-- /footer content -->
      </div>
    </div>
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">DESIGNATION</h4>
                        </div>
                        <form action="" method="post">
                        <div class="modal-body">
                          
                          <label>ADD DESIGNATION</label>
                          <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <input type="submit" class="btn btn-primary" name="save"/>
                        </div>

                      </div>
                    </div>
                  </div>

                

               
            </div>
        </div>
    </div>

    <button class="gl-side-menu-close-button" id="gl-side-menu-close-button">Close Menu</button>
</div>   
        </div>
    </div>
</div>
</div>


<script src="js/jquery.min.js.pagespeed.jm.tURYQi55sA.js"></script>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="vendors/nprogress/nprogress.js"></script>
    <!-- morris.js -->
    <script src="vendors/raphael/raphael.min.js"></script>
    <script src="vendors/morris.js/morris.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="vendors/moment/min/moment.min.js"></script>
    <script src="vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="build/js/custom.min.js"></script>

  </body>
</html>