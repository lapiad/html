<?php
include("conn.php");
session_start();
if (!isset($_SESSION["StudentName"]) && !isset($_SESSION["StudentName"])) {
  header("Location: /locker-system");
}
$sql = "SELECT locker_no FROM `logs` WHERE timeIn IS NOT NULL and timeOut IS NULL";
$result = $conn->query($sql);
$locked_list = [];
if ($result->num_rows > 0) {

  // output data of each row
  while ($row = $result->fetch_assoc()) {
    array_push($locked_list, $row["locker_no"]);
  }
} else {
  echo "";
}

function locker($lockerNumber, $locked_list)
{
  foreach ($locked_list as $locker) {
    if ($locker == $lockerNumber) {
      echo " locked";
    } else {
      echo "";
    }
  }
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
  <div class="locker-box">
    <form action="logout.php" method="post" style="text-align:right;">
      <button type="logout" id="logout">
        Logout
      </button>
    </form>
    <?php echo "<small>" . $_SESSION['StudentId'] . "</small> - " . $_SESSION['StudentName'] ?>
    </i>
    <h2>Student Locker System</h2>

    <h3>Available Lockers</h3>
    <div class="locker-container">
      <div id="locker-1" value="1" class="locker<?php locker(1, $locked_list) ?>">Locker 1</div>
      <div id="locker-2" value="2" class="locker<?php locker(2, $locked_list) ?>">Locker 2</div>
      <div id="locker-3" value="3" class="locker<?php locker(3, $locked_list) ?>">Locker 3</div>
      <div id="locker-4" value="4" class="locker<?php locker(4, $locked_list) ?>">Locker 4</div>
    </div>

    <!-- Locker PIN Entry Modal -->
    <div id="lockerModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <h3 id="lockerTitle">Locker</h3>
        <p id="lockerOwner"></p>
        <p id="lockerTime"></p>
        <input id="lockerPin" placeholder="Enter PIN" />
        <button id="locker-modal">Submit</button>
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
        <?php $sql = "SELECT * FROM `logs`";
        $result = $conn->query($sql);
        $studentId = "";
        $studentName = "";
        if ($result->num_rows > 0) {

          // output data of each row
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["locker_no"] . "</td>";
            echo "<td>" . $row["student_name"] . "</td>";
            echo "<td>" . $row["student_id"] . "</td>";
            echo "<td>" . $row["timeIn"] . "</td>";
            echo "<td>" . $row["timeOut"] . "</td>";
            echo "</tr>";
          }
        } else {
          echo "Wrong";
        }
        ?>
      </thead>
      <tbody id="logTable"></tbody>
    </table>


  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
  <script src="script.js"></script>



</body>

</html>