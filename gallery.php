<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <link href="css/lightbox.css" rel="stylesheet"/>
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript">
        function viewComments() {
            $.ajax({url: "singleImage.php", success: function (result) {
                $("#commentsDiv").html(result);
            }});
        }
        function dislikeImage() {
            $.ajax({url: "dislikeImage.php", success: function (result) {
                $("#likesDiv").html(result);
            }});
        }
        function likeImage() {
            $.ajax({url: "likeImage.php", success: function (result) {
                $("#likesDiv").html(result);
            }});
        }
    </script>
    <title>Gallery</title>
</head>
<body id="top">


<?php
include('connect.php');
session_start();
if (isset($_SESSION['username'])) {
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

    <div>
        <a href="profile.php"><?php echo $_SESSION['username']; ?></a>

    </div>
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

    <?php
    $files = scandir('uploads/');

    function images_only($file)
    {
        return preg_match('/\.(gif|jpg|png|jpeg)$/i', $file);
    }

    $files = array_filter($files, 'images_only');

    foreach ($files as $imagesInDir) {

        echo "<a href='uploads/" . $imagesInDir . "' data-lightbox='image-1' data-title='<div id=\"commentsDiv\">
        <a href=\"#\" onClick=\"viewComments()\">View Comments</a>
        </div>'>
        <img src='uploads/" . $imagesInDir . "' height='150' width='250'>

        </a>";
    }
    ?>



    <div id='likesDiv'>
        <p>Likes: </p>

        <p>Dislikes: </p>
        <br/>
        <a href='#' name='liked' onclick="likeImage()">Like</a>
        <a href='#' name='disliked' onclick="dislikeImage()">Dislike</a></div>
</div>

<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>