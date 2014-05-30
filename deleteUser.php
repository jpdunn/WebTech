<?php
include('connect.php');

session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];

$sql= ("DELETE FROM User_Info WHERE UserName = '$username'");
$result = mysql_query($sql);


if (mysql_affected_rows() == 1)  {
    session_start();
    unset($_SESSION["username"]);
    header("Location: index.php");
}
else {
    echo "invalid username and password, your account has not been deleted.";
    //die(mysql_error());

}

