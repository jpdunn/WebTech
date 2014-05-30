<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>


    <title>Gallery</title>

    <script type="text/javascript">

        function validateUpload() {
            var fileUpload = document.getElementById('fileUpload').value;
            var imageType = document.getElementById('imageType').value;
            var imageDescription = document.getElementById('imageDescription').value;
            if (fileUpload == null) {
                alert("You have not selected a file for upload");
                return false;
            }

            if (imageType == null) {
                alert("Please specify what type your image is");
                return false;
            }

            if(imageDescription == null){
                alert("Please enter a description");
                return false;
            }
        }


    </script>
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

<div style="text-align: center" class="wrapper col2">

    <form action="uploadImage.php" method="POST" enctype="multipart/form-data" id="fileUpload">
        File: <input type="file" name="userfile"/><br/>

        Description: <input type="text" name="imageDescription" id="imageDescription"/><br/>

        Type: <label>
            <select id="imageType" name="imageType" class="required">
                <option value="---">------</option>
                <option value="canvas">Canvas</option>
                <option value="print">Print</option>
                <option value="photographer">Photograph</option>
                <option value="digitalImage">Digital Image</option>
                <option value="sketch">Sketch</option>
            </select>
        </label>
        <button name="upload" type="submit" value="Upload!" onsubmit="return validateUpload()"/>
    </form>


</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>