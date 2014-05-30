<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <link rel="stylesheet" href="styles/register.css" type="text/css">


    <script type="text/javascript">

        function validateRegisterForm() {

            var username = document.registerForm.username.value;
            var password = document.registerForm.password.value;
            var email = document.registerForm.email.value;
            var gender = document.registerForm.gender.value;
            var artistType = document.registerForm.artistType.value;

            if (email == null || email == "") {
                alert("Email cannot be blank");
                return false;
            }

            if (username == null || username == "") {
                alert("Username cannot be blank");
                return false;
            }
            if (password == null || password == "") {
                alert("Password cannot be blank");
                return false;
            }
            if (artistType == null || artistType == "---") {
                alert("Please select your artist type");
                return false;
            }
            if (gender == null || gender == "---") {
                alert("Please select your gender");
                return false;
            }


        }
    </script>
    <title>Register</title>
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
            <li class="active"><a class="active" href="register.php">Register</a></li>
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

    <table style=" width: 300px; text-align: center">
        <tr>
            <form name="registerForm" method="post" onsubmit="return validateRegisterForm()" action="addUser.php">
                <td>
                    <table style="width: 100px;">
                        <tr>
                            <td colspan="3"><strong>Register</strong></td>
                        </tr>
                        <tr style="width: 100">
                            <td width="78">Email</td>
                            <td width="294"><input name="email" type="email" id="email"></td>
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
                            <td>Artist Type</td>
                            <td>
                                <label>
                                    <select name="artistType" class="required">
                                        <option value="---">------</option>
                                        <option value="painter">Painter</option>
                                        <option value="sculpter">Sculpter</option>
                                        <option value="photographer">Photographer</option>
                                        <option value="graphicDesigner">Graphic Designer</option>
                                        <option value="sketch">Sketch Artist</option>
                                    </select>
                                </label>
                            </td>
                        </tr>
                        <tr>

                            <td>Gender</td>
                            <td>
                                <label>
                                    <select name="gender" class="required">
                                        <option value="---">------</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </label>
                            </td>

                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="Submit" value="Register"></td>
                        </tr>
                    </table>
                </td>
            </form>
        </tr>
    </table>
    <div class="wrapper col6">
        <div id="footer">
            <p>All images &copy; Josh Dunn 2014</p>
        </div>
    </div>
</body>
</html>