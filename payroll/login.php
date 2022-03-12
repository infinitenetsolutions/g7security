<?php

include("db.php");

if(isset($_POST['submit']))
{

   $query="select * from users where username= '".$_POST['username']."' and password= '".$_POST['password']."'";
   //var_dump($query);exit();
   $result= mysqli_query($conn,$query);
   $res=mysqli_fetch_assoc($result);
   if(mysqli_num_rows($result)>0)
   {
    session_start();
    $_SESSION['admin_user'] = $_POST['username'];
    $_SESSION['user_id'] = $res['id'];
     $_SESSION['last_login_timestamp'] = time();
    header("location: index.php"); 
   }
   else
   {
    echo 'username & password is wrong';
   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <style>
        /*    --------------------------------------------------
  :: Login Section
  -------------------------------------------------- */
        #login {
            padding-top: 20px
        }
        #login .form-wrap {
            width: 30%;
            margin: 0 auto;
            background: #fff;
            border: 2px solid #1fa67b;
            position: relative;
            width: 350px;
            margin: 80px auto;
            padding: 20px 40px 40px;
        }
        #login h1 {
            color: #1fa67b;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            padding-bottom: 20px;
        }
        #login .form-group {
            margin-bottom: 25px;
        }
        #login .checkbox {
            margin-bottom: 20px;
            position: relative;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
        #login .checkbox.show:before {
            content: '\e013';
            color: #1fa67b;
            font-size: 17px;
            margin: 1px 0 0 3px;
            position: absolute;
            pointer-events: none;
            font-family: 'Glyphicons Halflings';
        }
        #login .checkbox .character-checkbox {
            width: 25px;
            height: 25px;
            cursor: pointer;
            border-radius: 3px;
            border: 1px solid #ccc;
            vertical-align: middle;
            display: inline-block;
        }
        #login .checkbox .label {
            color: #6d6d6d;
            font-size: 13px;
            font-weight: normal;
        }
        #login .btn.btn-custom {
            font-size: 14px;
            margin-bottom: 20px;
        }
        #login .forget {
            font-size: 13px;
            text-align: center;
            display: block;
        }

        /*    --------------------------------------------------
            :: Inputs & Buttons
            -------------------------------------------------- */
        .form-control {
            color: #212121;
        }
        .btn-custom {
            color: #fff;
            background-color: #1fa67b;
        }
        .btn-custom:hover,
        .btn-custom:focus {
            color: #fff;
        }

        /*    --------------------------------------------------
            :: Footer
            -------------------------------------------------- */
        #footer {
            color: #6d6d6d;
            font-size: 12px;
            text-align: center;
        }
        #footer p {
            margin-bottom: 0;
        }
        #footer a {
            color: inherit;
        }
    </style>
</head>

  <body>
   <section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="form-wrap">

          <center> <img src="images/logo.png" height="60" width="60">
          <h3>Payroll Login</h3>
          <hr/>
          </center>
            <form role="form" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="text" class="form-control" id="email" placeholder="Username" required="" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Password</label>
                            <input type="password" class="form-control" id="key"  placeholder="Password" required="" name="password" />
                        </div>
                        <div class="checkbox">
                            <span class="character-checkbox" onclick="showPassword()"></span>
                            <span class="label">Show password</span>
                        </div>

                <input type="submit" id="btn-login" name="submit"  class="btn btn-custom btn-lg btn-block" value="Log in">
                    </form>

              <div class="clearfix"></div>




                   <hr>
                   <center><p>Powered by:<a href="http://infinitenetsolutions.com/" target="_blank">INFINITE NET SOLUTIONS.</a> </p></center>
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
<script>
    function showPassword() {

        var key_attr = $('#key').attr('type');

        if(key_attr != 'text') {

            $('.checkbox').addClass('show');
            $('#key').attr('type', 'text');

        } else {

            $('.checkbox').removeClass('show');
            $('#key').attr('type', 'password');

        }

    }
</script>
</body>
</html>
