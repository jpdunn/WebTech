<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>

    <title>Images</title>

</head>
<body id="top">
<div class="wrapper col1">
    <div id="topbar">
        <div id="search">
            <form action="searchResults.php" method="post">
                <fieldset>
                    <legend>Site Search</legend>
                    <input type="text" value="Search the site&hellip;"
                           onfocus="this.value=(this.value=='Search the site&hellip;')? '' : this.value ;"
                           name="searchBar"/>
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
            <li class="active"><a href="browse.php">Browse</a>
            </li>
            <li><a href="#">Gallery</a>
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

<div id="browseDiv">
<?php


include('connect.php');


$tag = $_POST['imageType'];
//echo $tag;
$query = mysql_query("SELECT * FROM Uploaded_Images WHERE Tags='$tag'");

while ($row = mysql_fetch_array($query)) {
    $filename = $row['Filename'];
    echo "<p>File Name: " . $filename . " </p>";
    $uploader = $row['Uploaded_By'];
    echo "<p>Uploaded By: " . $uploader . " </p>";
    $imageTag = $row['Tags'];
    echo "<p>Image Tag: " . $imageTag . " </p>";
    $description = $row['Description'];
    echo "<p>Description: " . $description . " </p>";
    echo "<br/>";
}

?>

</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>