<?php

include('connect.php');
session_start();
$id = $_SESSION['username'];
$Description = $_POST['Description'];

if (isset($_SESSION['username'])) {
    $insert = mysql_query("UPDATE User_Info SET Description = ('$Description') WHERE UserName = '$id'");

}
if (!$insert) {

    die(mysql_error());

} else {

    header("Location: profile.php");


}