<?php include('connect.php');

$userName = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$artistType = $_POST['artistType'];
$gender = $_POST['gender'];
$userType = "guest";

$user_check = mysql_query("SELECT username FROM User_Info WHERE UserName='$userName'");

$do_user_check = mysql_num_rows($user_check);

//if ($do_user_check > 0) {
//
//    echo "Username already in use";
//} else {
//    echo "Username doesn't exist";
//
//
//}

$insert = mysql_query("INSERT INTO User_Info (UserName, Password, Email, User_Type, Gender, Artist_Type)
    VALUES ('$userName', '$password', '$email', '$userType', '$gender', '$artistType')");


if (!$insert) {

    die(mysql_error());

} else {

    header("Location: index.php");


}
