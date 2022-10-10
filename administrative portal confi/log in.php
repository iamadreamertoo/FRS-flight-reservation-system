<?php
session_start();
$message="";
include "db_name.php";
if(isset($_POST['First name'])&& isset($_POST['Last name']) && isset($_POST['Email address']) && isset($_POST['password'])){
    function validation($data){
        $data= trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return data;
    }
} 
$username = validation($_POST['username']);
$pass = validation($_POST['password']);
if (empty($uname)) {
    header (" Location: login index.php?error=User Name is required");
    exit();
}
else if(empty($pass)) {
    header ("Location: login index.php?error=Password is required");
    exit();
}
$sql = "SELECT * FROM user WHERE user_name='$username' AND Password='$pass'";
$result = (mysql_query($result)=== 1) {
    $row = mysqli_fetch_assoc($result);
    if($$row['user_name']===$uname && $row['password']===$pass) {
        echo "logged IN"
        $_SESSION['user_name']=$row['user_name'];
        $_SESSION['name']=$row['name'];
        $_SESSION['id']=$row['id'];
        header("location: admin page.php")
        exit();
    }
}
    else{
        header("Location: login index.php");
        exit();
    }
?>