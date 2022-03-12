<?php
include 'db.php';
if(isset($_POST['status'])) {

    mysqli_query($conn, "UPDATE `salary_payment` SET `payment`= '" . $_POST['status'] . "', `inserted_date`= now() WHERE id='" . $_POST['id'] . "'");
    $sel = mysqli_fetch_assoc(mysqli_query($conn, "select * from salary_payment where id = '" . $_POST['id'] . "'"));
   
  if($_POST['status'] == 1)
  {

      mysqli_query($conn, "INSERT INTO `balance_sheet`(`date`, `type`, `amount`, `emp_id`,`comp_id`,`c_bill_id`,`salarypay_id`) VALUES (now(), 'debit' ,'" . $sel['salary'] . "','" . $sel['emp_id'] . "','','','" . $sel['id'] . "')");
    
  }
    if($_POST['status'] == 0)
    {

        mysqli_query($conn, "delete from `balance_sheet` where salarypay_id='" . $sel['id'] . "' ");
        
    }

}
?>