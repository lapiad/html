<?php
include("conn.php");
session_start();
if (!isset($_SESSION["StudentName"]) && !isset($_SESSION["StudentName"])) {
  header("Location: /locker-system");
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
    <i>current user logged in:
      <?php echo "<small>" . $_SESSION['StudentId'] . "</small> - " . $_SESSION['StudentName'] ?>
    </i>
    <h2>Student Locker System</h2>

    <h3>Available Lockers</h3>
    <div class="locker-container">
      <div value="1" class="locker">Locker 1</div>
      <div value="2" class="locker">Locker 2</div>
      <div value="3" class="locker">Locker 3</div>
      <div value="4" class="locker">Locker 4</div>
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
      </thead>
      <tbody id="logTable"></tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="script.js"></script>

    <div class="log-out">
      <small>
        <a href="logout.php">Logout</a>
      </small>
    </div>

  </form>

</body>

</html>