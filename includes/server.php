<?php

    //connect to the database
    $db_host = ""; // ip address where the DB is running at
    $db_name = "";
    $db_user = "";
    $db_pass = "";
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    // check connection
    if ($mysqli->connect_error){
        die('Connect Error: ' . $mysqli->connect_error);
    }