<?php

include('connect.php');

$insert = mysql_query("UPDATE Rating SET Dislikes = Dislikes+1 WHERE ID=1");

if (!$insert) {

    die(mysql_error());

} else {

    $select = mysql_query("SELECT * FROM Rating");
    while ($row = mysql_fetch_array($select)) {
        $likes = $row['Likes'];
        echo "<p>Likes: ".$likes." </p>";
        $dislikes = $row['Dislikes'];
        echo "<p>Dislikes: ".$dislikes." </p>";
        echo "<br/>";

    }

}