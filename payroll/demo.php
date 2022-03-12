<?php
include("db.php");

if(isset($_POST['save'])){
    $checkbox = $_POST['check'];
    for($i=1;$i<=count($checkbox);$i++){
        $del_id = $checkbox[$i];
        $result=mysqli_query($conn,"DELETE FROM designation WHERE id='".$i."'");
//var_dump("DELETE FROM students WHERE id='".$i."'");exit();
//$message = " deleted successfully !";
    }
}
?>

<html lang="en">
<head>
    <title>CATEGORY</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
<div class="container">
    <form action="" method="post">
        <div class="col-md-4">
            <?php
            $query=mysqli_query($conn,"select * from designation"); // SQL Query
            ?> <ul>
                <li><input type="checkbox" class="parent" data-group=".group1" /> Select All</li>
                <?php while($row = mysqli_fetch_assoc($query))
                {
                    ?>


                    <li><input type="checkbox" class="group1" name="check[]"><?php echo $row['designation'];?> </li><?php } ?>

            </ul>



            <br />
            <p align="center"><button type="submit" class="btn btn-success" name="save">DELETE</button></p>
    </form>
    <script>
        $("#checkAl").click(function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    </script>

</div>
</div>

</body>
</html>
<script type="text/javascript">
    $(".parent").each(function(index){
        var group = $(this).data("group");
        var parent = $(this);

        parent.change(function(){  //"select all" change
            $(group).prop('checked', parent.prop("checked"));
        });
        $(group).change(function(){
            parent.prop('checked', false);
            if ($(group+':checked').length == $(group).length ){
                parent.prop('checked', true);
            }
        });
    });
</script>