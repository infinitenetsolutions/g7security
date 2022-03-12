<?php
include("db.php");
if (isset($_GET['term']))
{
    $query = $_GET['term'];
    //var_dump($query);
    $sql = mysqli_query($conn,"SELECT emp_name FROM emp_data WHERE emp_name LIKE '%{$query}%'");

        while($row = mysqli_fetch_assoc($sql)) {
            $countryResult[] = $row["emp_name"];
        }
        echo json_encode($countryResult);

}
?>