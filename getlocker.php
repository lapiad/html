<?php
include("conn.php");
$Locker_no = $_POST["locker_no"];

$sql = "SELECT * FROM logs WHERE locker_no = '$Locker_no' AND timeOut IS NULL";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $Object = array("pin" => $row["pin"], "id" => $row["id"]);
        echo json_encode($Object);
    }
} else {
    echo "Wrong";
}
?>