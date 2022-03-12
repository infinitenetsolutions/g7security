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

    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <!-- Custom Theme Style -->
    <link href="build/css/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <?php include 'sidebar.php';?>

        <!-- top navigation -->
         <?php include 'topbar.php';?>
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
                                            <input type="month" name="month" class="form-control col-md-7 col-xs-12" id="month" required="required" onchange="myfunction()" >

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
<?php include 'footer.php';
?>
<!-- /footer content -->
</div>
</div>


<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<!-- NProgress -->
<!-- iCheck -->
<!-- Datatables -->
<!-- Custom Theme Scripts -->
<script src="build/js/custom.min.js"></script>

<script type="text/javascript">
    function myfunction()
    {
        var cname=$("#comp_name option:selected").val();
        var month=$("#month").val();
        $.ajax({
            url: 'showsalary.php',
            type: 'POST',
            data: {month:month},
            success: function (data) {
                $("#showForm").html(data);
            },
        });


    }
</script>



</body>
</html>