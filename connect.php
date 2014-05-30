<?php
$mysql_hostname = "localhost";
$mysql_user = "Josh";
$mysql_password = "password";
$mysql_database = "ArtsHub";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) 
or die("Could not connect(user issue)");
mysql_select_db($mysql_database, $bd) or die("Could not find database");
?>