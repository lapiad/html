<?php
$loginUsername = $_POST['username'];
$loginPassword = $_POST['password'];
$servername = "localhost";
$username = "root";
$password = "";
$database = "locker";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
login($loginUsername, $loginPassword, $conn);
function login($loginUsername, $loginPassword, $conn)
{
  $sql = "SELECT * FROM `user` WHERE username='$loginUsername' AND password='$loginPassword'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      $studentId = $row["student_id"];
    }
  } else {
    echo "0 results";
  }



  $sql2 = "SELECT * FROM `Student` WHERE student_id='$studentId'";
  $result = $conn->query($sql2);

  if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
      echo "<h1> Student Name: " . $row["firstname"] . " " . $row["lastname"] . "</h1><br>";
      $_SESSION["studentName"] = $row["firstname"] . " " . $row["lastname"];
    }
  } else {
    echo "0 results";
  }
  $conn->close();
}

?>