<?php
$Servername = "loccalhost";
$username = "root";
$password = "";
$db_name = "admin login";
$conn = mysqli_connect($Servername, $username, $password, $db_name);
if(!$conn) {
    echo "Connection Failed";
}
?>