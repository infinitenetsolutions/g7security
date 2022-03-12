<?php
include 'db.php';

if(isset($_GET['q'])) {

    $sql = mysqli_query($conn, "SELECT id, emp_name FROM emp_data WHERE emp_name LIKE '%" . $_GET['q'] . "%'");
    $json = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $json[] = ['id' => $row['id'], 'text' => $row['emp_name']];
    }


    echo json_encode($json);
}





?>