<?php
include("conn.php");
session_start();

$studentName = $_SESSION["StudentName"];
$studentId = $_SESSION["StudentId"];
$Locker_no = $_POST["locker_no"];
$timein = date_format(new DateTime('now'), "Y/m/d H:i:s");
$pin_no = $_POST["pin"];

$sql = "INSERT INTO `logs`(`student_name`, `student_id`, `locker_no`, `timeIn`, `pin`) 
VALUES ('$studentName','$studentId','$Locker_no', '$timein','$pin_no')";

if (mysqli_query($conn, $sql) === TRUE) {
  echo "Register DONE";
} else {
  echo "NOT REGISTER!";
}

?>