<?php
session_start();
include 'connection/db.php';
if (!isset($_SESSION['user']))
{
    session_destroy();
    session_unset();
    header("location: logout.php");
}
if(isset($_POST['submit']))
     // var_dump($_POST['submit']);exit();
{
if(isset($_GET['n_id']))
{

   if(!empty($_FILES['file']['name']))
        {
            $targetfolder = "news/";
            $file = rand(0, 99999) .  $_FILES['file']['name'] ;
            if( move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder . $file))
            {
               $update_package = mysqli_query($dbcon, "UPDATE `news` SET `header`='" . $_POST['header'] . "',`details`='" . $_POST['details'] . "', `file`='" .$file . "'WHERE id='" . $_GET['n_id'] . "' ");

                           }
        }
        else
        {
$update_package = mysqli_query($dbcon, "UPDATE `news` SET `header`='" . $_POST['header'] . "',`details`='" . $_POST['details'] . "' WHERE id='" . $_GET['n_id'] . "' ");


        }

    
  
//   var_dump(expression)
}
else {

            $targetfolder = "news/";
            $file = rand(0, 99999) .  $_FILES['file']['name'] ;
            if( move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder . $file))
            {
  $insert_package = mysqli_query($dbcon,"INSERT into news(`id`, header,`details`,`file`) values (NULL,'".$_POST['header']."','".$_POST['details']."','".$file."')");
  // var_dump("INSERT into news(`id`, header,`details`,`file`) values (NULL,'".$_POST['header']."','".$_POST['details']."','".$file."')");exit();
  header('location:newslist.php');
  

}


    
   
}
}

$sel_news = mysqli_query($dbcon, "select * from news where id='".$_GET['n_id']."'");
// var_dump("select * from clients where id='".$_GET['ct_id']."'");
$result = mysqli_fetch_assoc($sel_news);
// var_dump($result);exit();


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title> Dashboard</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   
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
           News
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
                  <h3 class="box-title">ADD NEW news</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
             <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">news Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="News Header" name="header" required="required" <?php if(isset($_GET['n_id'])) {?> value="<?php echo $result['header']; ?>" <?php } ?>  >
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">news details</label>
                <div class="col-sm-8">
                   <textarea id="editor1" name="details" rows="10" cols="80">
                                           
                                           <?php if(isset($_GET['n_id'])) echo $result['details']; ?>

                    </textarea>
                   
                  </div>
                </div>


                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Image</label>
               <div class="col-sm-8">
                    <input type="file" class="form-control" id="imgInp" placeholder="Files" name="file" onchange="readURL(this);" value="<?php if(isset($_GET['n_id'])) {echo $result['file']; }?>" width="100px" height="100px">
                    <img id="blah" width="100px" height="100px" src="<?php if(isset($_GET['n_id'])) {?>news/<?php echo $result['file']; ?>"  <?php } ?>">
                    
                    
                  </div>
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
    <script src="bower_components/ckeditor/ckeditor.js"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
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
  </body>
</html>
<?php
?>
