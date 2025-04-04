<?php
include("conn.php");


$studentID = $_POST["student_id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$middlename = $_POST["middlename"];
$email = $_POST["Email"];
$address = $_POST["Address"];
$username = $_POST["Username"];
$password = $_POST["Password"];
$birthday = $_POST["Birthday"];


$sql = "INSERT INTO `student`(`student_id`, `firstname`, `lastname`, `middlename`, `email`, `address`, `birthday`)
 VALUES ('$studentID','$firstname','$lastname','$middlename','$email','$address','$birthday')";

if (mysqli_query($conn, $sql) === TRUE) {
    echo "DATA SAVED SUCCESSFULLY!!";
} else {
    echo "BOBO!";
}

$sql1 = "INSERT INTO `user`(`student_id`, `username`, `password`) VALUES ('$studentID','$username','$password')";
if (mysqli_query($conn, $sql1) === TRUE) {
    echo "username save!";
    header('Location: /locker-system');
} else {
    echo "username not save!";
}


?>