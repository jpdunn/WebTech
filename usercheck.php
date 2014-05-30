<?php include('connect.php');

$nRows = 0;
$rString = "";
$userCheck = $_POST['username'];
$passCheck = $_POST['password'];

$entrytest = mysql_query("SELECT UserName, Password, User_Type FROM User_Info WHERE UserName='$userCheck' AND Password='$passCheck'");

$nRows = mysql_num_rows($entrytest);

$user_id = '';

for ($i = 0; $i < $nRows; $i++) {
    $row = mysql_fetch_array($entrytest);
    $rString .= $row['User_Type'];
}


if ($nRows == 1) {
    session_start();

    $_SESSION['username'] = $userCheck;

    if ($rString == 'admin') {
        header("Location: index.php");
    }
    if ($rString == 'guest') {
        header("Location: gallery.php");
    }
} else {
    echo "Please register an account.";
}
?>