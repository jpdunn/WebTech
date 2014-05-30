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
    <form id="browse" name="browse" method="post" action="browseResults.php">
                Select Image Type: <label>
                    <select id="imageType" name="imageType" class="required">
                        <option value="---">------</option>
                        <option value="Canvas">Canvas</option>
                        <option value="Print">Print</option>
                        <option value="Photographer">Photograph</option>
                        <option value="DigitalImage">Digital Image</option>
                        <option value="Sketch">Sketch</option>
                    </select>
        </label>

        <input type="submit" value="Browse"  name="browse">
    </form>


</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>