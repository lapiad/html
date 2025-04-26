<?php
include("conn.php");

$id = $_POST["id"];
$timeout = date_format(new DateTime('now'), "Y/m/d H:i:s");
$sql = "UPDATE `logs` SET `timeOut`='$timeout' WHERE `id`='$id'";

if (mysqli_query($conn, $sql) === TRUE) {
    echo "DONE";
} else {
    echo "FAIL";
}
?>