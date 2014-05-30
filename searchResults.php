<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <title>Search Results</title>
</head>
<body id="top">
<?php
session_start();
if (isset($_SESSION['username'])) {
    echo "you are now logged in as " . "<a style='font-size: 20px' href='profile.php'>" . $_SESSION['username'] . "</a>";
} else {
    echo "not logged in";

}
?>
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
            <li><a href="browse.php">Browse</a>

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

<div style="text-align: center" class="wrapper col2">

    <?php
    include('connect.php');
    $search = $_POST['searchBar'];

    $query = mysql_query("SELECT Filename, Description FROM Uploaded_Images WHERE Description LIKE '%{$search}%'");
    $allResults = mysql_fetch_array($query);

    if (count($allResults) == 1) {


        echo '<script language="javascript">';
        echo 'alert("Your search did not yield any results")';
        echo '</script>';
    } else {

        while ($row = mysql_fetch_array($query)) {
            $description = $row['Description'];
            echo "<p>Description: " . $description . " </p>";
            $filename = $row['Filename'];
            echo "<p>File Name: " . $filename . "</p>";
            echo "<br/>";

        }
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