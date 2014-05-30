<?php

include('connect.php');

//session_start();
//$username = $_SESSION['username'];
//echo $username;


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>

    <title>Gallery</title>
</head>
<body id="top">
<div class="wrapper col1">
    <div id="topbar">
        <div id="search">
            <form action="searchResults.php" method="post">
                <fieldset>
                    <legend>Site Search</legend>
                    <input type="text" value="Search the site&hellip;"
                           onfocus="this.value=(this.value=='Search the site&hellip;')? '' : this.value ;" name="searchBar"/>
                    <input type="submit" name="go" id="go" value="GO"/>
                </fieldset>
            </form>
        </div>
    </div>
</div>
<div class="wrapper col2">
    <div id="header">
        <div id="logo">
            <h1><a href="#">Arts Hub</a></h1>

            <p>An arts community</p>
        </div>
        <ul id="topnav">
            <li class="last"><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="allArtists.php">Featured Artists</a></li>
            <li><a href="browse.php">Browse</a>
            </li>
            <li class="active"><a href="#">Gallery</a>
                <ul>
                    <li><a href="upload.php">Upload</a></li>
                    <li><a href="gallery.php">Most Recent</a></li>
                </ul>
            </li>
            <li><a href="index.php">Home</a></li>
        </ul>
        <br class="clear"/>
    </div>
</div>

<div>

    <div>
        <div>

            <?php


            $result = mysql_query("SELECT * FROM Comments");
//            while ($row = mysql_fetch_array($result)) {
//                $username = $row['Username'];
//                echo "<label style='text-align: center'>Username</label>";
//                echo "<h5 style='text-align: center'>" . $username . "</h5>";
//                $comment = $row['Comment'];
//                echo "<label style='text-align: center'>Comment</label>";
//
//                echo "<label>Comment</label><p style='text-align: center'>" . $comment . "</p>";
//
//            }



            $files = scandir('uploads/');

            function images_only($file)
            {
                return preg_match('/\.(gif|jpg|png|jpeg)$/i', $file);
            }

            $files = array_filter($files, 'images_only');

//            foreach ($files as $imagesInDir) {
//
//                //echo $imagesInDir;
//
//                echo "<a href='uploads/'" . $imagesInDir . "'><img src='uploads/'" . $imagesInDir . "' height='150' width='250'></a>";
//            }
            foreach ($files as $imagesInDir) {

                $imageNum = 0;
                //echo $imagesInDir;

                echo "<a href='singleImage.php' name='. $imageNum .'>
                <img src='uploads/" . $imagesInDir . "' height='150' width='250'></a>";
                $imageNum++;
            }



            ?>
        </div>
    </div>
<div style="text-align: center">
    <h3>Add Comment:</h3>

    <form method="post" action="addComment.php">
        Username: <input type="text" name="username"><br>
        Comment: <input type="text" name="comment"><br>
        <button type="submit" value="Add Comment"></button>

        <label>
            <select name="imageNum" class="required">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
            </select>
        </label>

    </form>

</div>

</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>