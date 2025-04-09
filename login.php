<?php

include("conn.php");
session_start();
$loginUsername = $_POST['username'];
$loginPassword = $_POST['password'];

login($loginUsername, $loginPassword, $conn);
header('Location: /locker-system/Locker.php');
function login($loginUsername, $loginPassword, $conn)
{
    $sql = "SELECT * FROM `user` WHERE username='$loginUsername' AND password='$loginPassword'";
    $result = $conn->query($sql);
    $studentId = "";
    $studentName = "";
    if ($result->num_rows > 0) {

        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $studentId = $row['student_id'];
            $_SESSION["StudentId"] = $studentId;
        }
    } else {
        echo "Wrong Username/Password";
    }

    $sql2 = "SELECT * FROM `Student` WHERE student_id='$studentId'";
    $result = $conn->query($sql2);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $studentName = $row["firstname"] . " " . $row["lastname"];
            $_SESSION["StudentName"] = $studentName;
        }
    } else {
        echo "No Student Found";
    }
    $conn->close();
    return $studentName;
}
?>