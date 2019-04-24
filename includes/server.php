<?php

    //connect to the database
    $db_host = "140.254.14.102"; // ip address where the DB is running at
    $db_name = "db_scholarhip_project";
    $db_user = "user_scholar";
    $db_pass = "Password123!";
    $mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
    // check connection
    if ($mysqli->connect_error){
        die('Connect Error: ' . $mysqli->connect_error);
    }

