<!DOCTYPE html>
<html>
<head>
    <title>ArtsHub</title>
    <link rel="stylesheet" href="styles/layout.css" type="text/css"/>
    <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="js/jssor.core.js"></script>
    <script type="text/javascript" src="js/jssor.utils.js"></script>
    <script type="text/javascript" src="js/jssor.slider.js"></script>
    <script>
        function showRSS(str) {
            if (str.length == 0) {
                document.getElementById("rssOutput").innerHTML = "";
                return;
            }
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {  // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    document.getElementById("rssOutput").innerHTML = xmlhttp.responseText;
                }
            }
            xmlhttp.open("GET", "getrss.php?q=" + str, true);
            xmlhttp.send();
        }
    </script>
    <script>

        jQuery(document).ready(function ($) {

            var _SlideshowTransitions = [
                //Fade transition
                { $Duration: 1500, $Opacity: 2 }
            ];

            var options = {
                $AutoPlay: true,                                    //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
                $AutoPlaySteps: 1,                                  //[Optional] Steps to go for each navigation request (this options applys only when slideshow disabled), the default value is 1
                $AutoPlayInterval: 4000,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
                $PauseOnHover: 0,                               //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, default value is 3

                $ArrowKeyNavigation: true,   			            //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
                $SlideDuration: 500,                                //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $MinDragOffsetToSlide: 20,                          //[Optional] Minimum drag offset to trigger slide , default value is 20
                //$SlideWidth: 600,                                 //[Optional] Width of every slide in pixels, default value is width of 'slides' container
                //$SlideHeight: 300,                                //[Optional] Height of every slide in pixels, default value is height of 'slides' container
                $SlideSpacing: 0, 					                //[Optional] Space between each slide in pixels, default value is 0
                $DisplayPieces: 1,                                  //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
                $ParkingPosition: 0,                                //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
                $UISearchMode: 1,                                   //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
                $PlayOrientation: 1,                                //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, default value is 1
                $DragOrientation: 3,                                //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

                $SlideshowOptions: {                                //[Optional] Options to specify and enable slideshow or not
                    $Class: $JssorSlideshowRunner$,                 //[Required] Class to create instance of slideshow
                    $Transitions: _SlideshowTransitions,            //[Required] An array of slideshow transitions to play slideshow
                    $TransitionsOrder: 1,                           //[Optional] The way to choose transition to play slide, 1 Sequence, 0 Random
                    $ShowLink: true                                    //[Optional] Whether to bring slide link on top of the slider when slideshow is running, default value is false
                },

                $BulletNavigatorOptions: {                                //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,                       //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $AutoCenter: 1,                                 //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                    $Steps: 1,                                      //[Optional] Steps to go for each navigation request, default value is 1
                    $Lanes: 1,                                      //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                                   //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                                   //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,              //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2,                               //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
                }
            };
            var imageSlider = new $JssorSlider$("slider1_container", options);

            //Responive code, needed to fit slider inside normal webpage
            function ScaleSlider() {
                var parentWidth = imageSlider.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    imageSlider.$SetScaleWidth(Math.min(parentWidth, 600));
                else
                    window.setTimeout(ScaleSlider, 30);
            }

            ScaleSlider();

            if (!navigator.userAgent.match(/(iPhone|iPod|iPad|BlackBerry|IEMobile)/)) {
                $(window).bind('resize', ScaleSlider);
            }
        });
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
<a style="font-size: 20px"></a>

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
            <li><a href="register.php">Register</a>
            <li><a href="allArtists.php">Featured Artists</a>

            <li><a href="browse.php">Browse</a>
            </li>
            <li><a href="#">Gallery</a>
                <ul>
                    <li><a href="upload.php">Upload</a></li>
                    <li><a href="gallery.php">Most Recent</a></li>
                </ul>
            </li>
            <li class="active"><a href="index.php">Home</a></li>
        </ul>
        <br class="clear"/>
    </div>
</div>
<div class="wrapper col3">
    <div id="gallery">
        <div id="slider1_container"
             style="position: relative; top: 0px; left: 200px; width: 800px; height: 500px; overflow: hidden; ">

            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px;">
                <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
                <div style="position: absolute; display: block; background: url(img/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
                </div>
            </div>

            <!-- Slides Container -->
            <div u="slides"
                 style="cursor: move; position: absolute; left: 0px; top: 0px; width: 800px; height: 500px; overflow: hidden;">

                <?php
                $files = scandir('uploads/');

                function images_only($file)
                {
                    return preg_match('/\.(gif|jpg|png|jpeg)$/i', $file);
                }

                $files = array_filter($files, 'images_only');

                foreach ($files as $imagesInDir) {

                    echo "<div><img u='image' src='uploads/" . $imagesInDir . "'/></div>";
                }


                ?>

            </div>

            <!-- Bullet Navigator Skin Begin -->
            <style>
                /* jssor slider bullet navigator skin 05 css */
                /*
                .jssorb05 div           (normal)
                .jssorb05 div:hover     (normal mouseover)
                .jssorb05 .av           (active)
                .jssorb05 .av:hover     (active mouseover)
                .jssorb05 .dn           (mousedown)
                */
                .jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
                    background: url(img/b05.png) no-repeat;
                    overflow: hidden;
                    cursor: pointer;
                }

                .jssorb05 div {
                    background-position: -7px -7px;
                }

                .jssorb05 div:hover, .jssorb05 .av:hover {
                    background-position: -37px -7px;
                }

                .jssorb05 .av {
                    background-position: -67px -7px;
                }

                .jssorb05 .dn, .jssorb05 .dn:hover {
                    background-position: -97px -7px;
                }
            </style>
            <!-- bullet navigator container -->
            <div u="navigator" class="jssorb05" style="position: absolute; bottom: 16px; right: 6px;">
                <!-- bullet navigator item prototype -->
                <div u="prototype" style="POSITION: absolute; WIDTH: 16px; HEIGHT: 16px;"></div>
            </div>
            <style>
                /* jssor slider arrow navigator skin 12 css */
                /*
                .jssora12l              (normal)
                .jssora12r              (normal)
                .jssora12l:hover        (normal mouseover)
                .jssora12r:hover        (normal mouseover)
                .jssora12ldn            (mousedown)
                .jssora12rdn            (mousedown)
                */
                .jssora12l, .jssora12r, .jssora12ldn, .jssora12rdn {
                    position: absolute;
                    cursor: pointer;
                    display: block;
                    background: url(img/a12.png) no-repeat;
                    overflow: hidden;
                }

                .jssora12l {
                    background-position: -16px -37px;
                }

                .jssora12r {
                    background-position: -75px -37px;
                }

                .jssora12l:hover {
                    background-position: -136px -37px;
                }

                .jssora12r:hover {
                    background-position: -195px -37px;
                }

                .jssora12ldn {
                    background-position: -256px -37px;
                }

                .jssora12rdn {
                    background-position: -315px -37px;
                }
            </style>
            <!-- Arrow Left -->
        <span u="arrowleft" class="jssora12l" style="width: 30px; height: 46px; top: 250px; left: 0px;">
        </span>
            <!-- Arrow Right -->
        <span u="arrowright" class="jssora12r" style="width: 30px; height: 46px; top: 250px; right: 0px">
        </span>
        </div>
    </div>
</div>

<div class="wrapper col6">
    <div id="footer">
        <script>showRSS("Google");</script>

        <div id="rssOutput">Loading...


        </div>

    </div>
</div>
</body>
</html>
