<?php

class viewComments {

    function __construct() {
        print "In BaseClass constructor\n";
        include('connect.php');

        $allResults = array();
        $files = scandir('uploads/');
    }



} 