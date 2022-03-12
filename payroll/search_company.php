<?php
include("db.php");
if (isset($_GET['term']))
{
    $query = $_GET['term'];
    //var_dump($query);
    $sql = mysqli_query($conn,"SELECT company_name FROM company WHERE company_name LIKE '%{$query}%'");

        while($row = mysqli_fetch_assoc($sql)) {
            $countryResult[] = $row["company_name"];
        }
        echo json_encode($countryResult);

}
?>