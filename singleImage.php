<?php

include('connect.php');


$ID = $_REQUEST['ID'];
echo $ID;

$allResults = array();
$files = scandir('uploads/');
function images_only($file)
{
    return preg_match('/\.(gif|jpg|png|jpeg)$/i', $file);
}

$files = array_filter($files, 'images_only');

foreach ($files as $imagesInDir) {
    array_push($allResults, $imagesInDir);
}
//$getCurrentPhotoByID = mysql_query("SELECT ID FROM Uploaded_Images WHERE Filename='$allResults'");

$currentPhoto = 1;

$result = mysql_query("SELECT * FROM Uploaded_Images, Comments WHERE Uploaded_Images.ID=Comments.ImageID");

for ($i = 1; $i < count($allResults) + 1; $i++) {
    while ($row = mysql_fetch_array($result)) {
        $username = $row['Username'];
        echo "<p>Username: " . $username . " </p>";
        $comment = $row['Comment'];
        echo "<p>Comment: " . $comment . " </p>";
        echo "<br/>";
    }
    $currentPhoto++;
}

echo "<form action='addComment.php' method='post'>Username:
        <input type=\"text\" name=\"userName\"><br>
        Comment:
        <input type=\"text\" name=\"comment\">
        <input type='button' value='submit'>
        </form>"



?>