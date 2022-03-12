<?php
 # code...
  include ("connection/db.php");

if(isset($_POST['submit'])) 
{
 
  $sel_user="select * from login where username= '".$_POST['username']."' and password= '".md5($_POST['password'])."'";
  $user = mysqli_query($dbcon,$sel_user);
  if(mysqli_num_rows($user)>0)
  {
    session_start();
    $_SESSION['user'] = $_POST['username'];
    header('location:index.php');
  }
  else
  {
    echo 'username & password is incorrect';
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Admin| Dashboard</title>
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
    <style type="text/css">
      @media only screen and (min-width: 768px){
        .login-logo{width: 800px;margin-left: -197px;}
      }
    </style>
  </head>
  <body class="login-page" style="background: url('images/2.jpg');">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php"><b style="color: #ffffff;">G7 INDUSTRIAL SECURITY AGENCY (P) LTD.</b></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body"> 
        <p class="login-box-msg"> Administrator Panel</p>
        <form method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-xs-6" style="float:center">
              <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Login</button>
            </div><!-- /.col -->
          </div>
        </form>

        <!-- /.social-auth-links -->

       

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="../../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="../../plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
