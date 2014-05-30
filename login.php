<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <link rel="stylesheet" href="styles/register.css" type="text/css">

    <script type="text/javascript">

        function validateLoginForm() {

            var username = document.form1.username.value;
            if (username == null || username == "") {

                alert("Username cannot be blank");

                return false;
            }
            var password = document.form1.password.value;
            if (password == null || password == "") {
                alert("Password cannot be blank");
                return false;
            }
        }
    </script>

    <title>Login</title>
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
            <li class="active" class="last"><a href="login.php">Login</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="allArtists.php">Featured Artists</a>


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
<div class="wrapper col3">

    <div style="text-align: center">
        <table style=" width: 300px; align: center">
            <tr>
                <form name="form1" action="usercheck.php" onsubmit="return validateLoginForm()" method="post">
                    <td>
                        <table style="width: 100px;">
                            <tr>
                                <td colspan="3"><strong>Member Login </strong></td>
                            </tr>
                            <tr style="width: 100">
                                <td width="78">Username</td>
                                <td width="294"><input name="username" type="text" id="username"></td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input name="password" type="password" id="password"></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td><input type="submit" name="Submit" value="Login"></td>
                            </tr>
                        </table>
                    </td>
                </form>
            </tr>
        </table>
    </div>

</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>
</body>
</html>