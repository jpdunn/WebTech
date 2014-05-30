<?php
include('connect.php');


$query = mysql_query("SELECT * FROM User_Info");
while ($row = mysql_fetch_array($query)) {
    $username = $row['UserName'];
    echo "<p>Artist: ".$username." </p>";
    echo "<br/>";

}