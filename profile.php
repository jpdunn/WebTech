<?php
include('connect.php');

session_start();
$id = $_SESSION['username'];

$result = mysql_query("SELECT * FROM User_Info where UserName='$id'");
while ($row = mysql_fetch_array($result)) {
    $username = $row['UserName'];
    $password = $row['Password'];
    $email = $row['Email'];
    $userType = $row['User_Type'];
    $gender = $row['Gender'];
    $artistType = $row['Artist_Type'];
    $description = $row['Description'];
}



?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript">
        function viewProfileData() {
            $.ajax({url: "viewProfile.php", success: function (result) {
                $("#profileDiv").html(result);
            }});
        }
    </script>


    <title>Profile</title>
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

<div class="wrapper col2" id="profileDiv">

    <table width="200" border="0" align="center" cellpadding="0">
        <tr>
            <td style="height: 30; text-align: center" colspan="2">Your Profile Information</td>
            <td>
                <div align="right"><a href="logout.php">logout</a></div>
            </td>
        </tr>
        <tr>
            <td style="vertical-align: top; width: 300px">
                <div align="left">UserName:</div>
            </td>
            <td style="width: 300px" valign="top"><?php echo $username ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">Password:</div>
            </td>
            <td valign="top"><?php echo $password ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">User Type:</div>
            </td>
            <td valign="top"><?php echo $userType ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">Artist Type:</div>
            </td>
            <td valign="top"><?php echo $artistType ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">Gender:</div>
            </td>
            <td valign="top"><?php echo $gender ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">Email Address:</div>
            </td>
            <td valign="top"><?php echo $email ?></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="left">Description:</div>
            <td valign="top"><?php echo $description ?></td>
            <td>
                <div class="textboxes">
                    <form name="Description" method="post" action="editDescription.php" >
                        <span></span><input name="Description" type="text" id="Description">
                        <input type="submit" value="Edit" id="editBut">
                        <input type="submit" value="Test" onsubmit="viewProfileData()" >

                    </form>
                </div>

            </td>

        </tr>

        <tr>
            <td><a href="deleteUser.php">Delete Account</a></td>
        </tr>
    </table>
</div>


<div class="wrapper col6">
    <div id="footer">
        <p>All images &copy; Josh Dunn 2014</p>
    </div>
</div>

<script type="text/javascript">

    $("#editBut").click(function() {
        if ($('.textboxes input[type=text]').is(':visible')) {
            $('.textboxes input[type=text]').hide();
            $('.textboxes ul li span').show();

            // do save info
            $('.textboxes input[type=text]').each(function() {
                $(this).prev().text($(this).val());
            });

            $(this).val('Edit');
        }
        else {
            $('.textboxes input[type=text]').show();
            $('.textboxes ul li span').hide();
            $(this).val('Save');
        }
        //$(this).hide().after('<span class="dfk">' + $(this).val() + '</span>');
    });

</script>
</body>
</html>