<?php
include('connect.php');
session_start();
$username = $_SESSION['username'];

if (isset($username)) {

    if (isset($_POST['upload'])) {

        $allowed_filetypes = array('.jpg', '.jpeg', '.png', '.gif');
        $max_filesize = 10485760;
        $upload_path = 'uploads/';
        $description = $_POST['imageDescription'];
        $filename = $_FILES['userfile']['name'];
        $fileExtension = explode('/', ($_FILES['userfile']['type']))[1];
        $newFileName = time() . "." . $fileExtension;

        $ext = substr($filename, strpos($filename, '.'), strlen($filename) - 1);

        if (!in_array($ext, $allowed_filetypes))
            die('The file you attempted to upload is not allowed.');

        if (filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
            die('The file you attempted to upload is too large.');

        if (!is_writable($upload_path))
            die('You cannot upload to the specified directory, please CHMOD it to 777.');

        if (move_uploaded_file($_FILES['userfile']['tmp_name'], $upload_path . $newFileName)) {
            $query = "INSERT INTO Uploaded_Images (Filename, Description, Uploaded_By) VALUES ('$newFileName', '$description', '$username')";
            mysql_query($query);

            echo 'Your file upload was successful!';


        } else {
//            echo '<script language="javascript">';
//            echo 'alert("message successfully sent")';
//            echo '</script>';
            echo 'There was an error during the file upload.  Please try again.';
        }
    }

} else {
    echo '<script language="javascript">';
    echo 'alert("You need to be logged in to upload images.")';
    echo '</script>';
    header("Location: upload.php");

//    echo 'You need to be logged in to upload images';

}

