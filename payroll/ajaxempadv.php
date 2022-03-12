<?php
include 'db.php';

if(isset($_GET['q']))
{
    $sql = mysqli_query($conn, "SELECT e.emp_name,a.id as id, a.advance_type FROM advance a left join emp_data e on a.emp_name = e.id WHERE e.emp_name LIKE '%" . $_GET['q'] . "%' AND a.advance_type != 'uniform_monthly' GROUP BY  e.emp_name");
      $json = [];
    while ($row = mysqli_fetch_assoc($sql)) {
        $json[] = ['id' => $row['id'], 'text' => $row['emp_name']];
    }


    echo json_encode($json);

}

?>