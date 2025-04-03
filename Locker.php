<?php
session_start();
if (!isset($_POST["username"]) && !isset($_POST["password"])) {
  if (!isset($_SESSION["StudentName"])) {
    header("Location: /locker-system");
  } else {
    echo $_SESSION["StudentName"];
  }
}

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

$studentName = login($loginUsername, $loginPassword, $conn);
$_SESSION["StudentName"] = $studentName;
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
      $studentName = $row["firstname"] . " " . $row["lastname"];
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  return $studentName;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Locker System</title>
  <link rel="stylesheet" href="styles.css" />
</head>

<body>
  <?php

  ?>
  <form>
    <i>current user logged in: <?php echo $studentName ?></i>
    <h2>Student Locker System</h2>

    <!-- Student Registration Form -->
    <div id="register">
      <h3>Register Student</h3>
      <input type="text" id="studentName" placeholder="Enter Name" />
      <input type="text" id="studentId" placeholder="Enter Student ID" />
      <button id="register-btn" onclick="registerStudent()">Register</button>
    </div>

    <h3>Available Lockers</h3>
    <div class="locker-container">
      <div class="locker" onclick="openLocker(1)">Locker 1</div>
      <div class="locker" onclick="openLocker(2)">Locker 2</div>
      <div class="locker" onclick="openLocker(3)">Locker 3</div>
      <div class="locker" onclick="openLocker(4)">Locker 4</div>
    </div>

    <!-- Locker PIN Entry Modal -->
    <div id="lockerModal" class="modal">
      <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h3 id="lockerTitle">Locker</h3>
        <p id="lockerOwner"></p>
        <p id="lockerTime"></p>
        <input type="password" id="lockerPin" placeholder="Enter PIN" />
        <button id="locker-modal" onclick="lockUnlockLocker()">Submit</button>
      </div>
    </div>

    <!-- Time Log Display -->
    <h3>Locker Usage Logs</h3>
    <table border="1">
      <thead>
        <tr>
          <th>Locker No.</th>
          <th>Student Name</th>
          <th>Student ID</th>
          <th>Time In</th>
          <th>Time Out</th>
        </tr>
      </thead>
      <tbody id="logTable"></tbody>
    </table>

    <script src="script.js"></script>
  </form>
</body>

</html>