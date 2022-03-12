<?php
include 'db.php';

if(isset($_GET['q'])) {

    $sql = mysqli_query($conn, "SELECT id, company_name FROM company WHERE company_name LIKE '%" . $_GET['q'] . "%'");
    $json = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $json[] = ['id' => $row['id'], 'text' => $row['company_name']];
    }


    echo json_encode($json);
}





?>