<?php

// All functions or methods to talk to the database will be created here.
// This file will need to be included everytime we want to use any of the methods here created


function greeting($name){
    return 'Hola '.$name;
}



function show_scholarship($db_handler){
    $html_read = "";
    $sql="SELECT * FROM Scholarship";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // echo var_dump($row);
            // echo '</pre>';
            
            $html_read = $html_read.'<li>';
            
            $html_read.= $row['scholarshipID'].'  - ';
            $html_read.= $row['title'].' '.$row['amount'].'<br/>applyURL: ';
            $html_read.= $row['applyURL'].'<br/>';
            $html_read.= 'deaDLINE: '.$row['deadline'];
            $html_read.= 'minReq: '.$row['minRequirements'];
            $html_read.= 'gpa: '.$row['gpa'];
            $html_read.= '<br/>status: '.$row['u_status'];
            $html_read.= 'sponsorID: '.$row['sponsorID'];
            $html_read.= 'regDay: '.$row['regDay'];
            $html_read.= '<br/><br/>';
                $html_read = $html_read.'</li>';
        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}


function show_sponsor($db_handler){
    $html_read = "";
    $sql="SELECT * FROM Sponsor";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // echo var_dump($row);
            // echo '</pre>';
            
            $html_read = $html_read.'<li>';
            
            $html_read.= $row['scholarshipID'].'  - ';
            $html_read.= $row['title'].' '.$row['amount'].'<br/>applyURL: ';
            $html_read.= $row['applyURL'].'<br/>';
            $html_read.= 'deaDLINE: '.$row['deadline'];
            $html_read.= 'minReq: '.$row['minRequirements'];
            $html_read.= 'gpa: '.$row['gpa'];
            $html_read.= '<br/>status: '.$row['u_status'];
            $html_read.= 'sponsorID: '.$row['sponsorID'];
            $html_read.= 'regDay: '.$row['regDay'];
            $html_read.= '<br/><br/>';
                $html_read = $html_read.'</li>';
        }
    }else{
        echo "bad";
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}


function show_users($db_handler){
    $html_read = "";
    $sql="SELECT * FROM Users";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result->num_rows>=1){
       while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // echo var_dump($row);
            // echo '</pre>';
            
            $html_read = $html_read.'<li>';
            
            $html_read.= $row['userID'].'  - ';
            $html_read.= $row['firstName'].' '.$row['lastName'].'<br/>email: ';
            $html_read.= $row['email'].'<br/>';
            $html_read.= 'startDay: '.$row['startDay'];
            $html_read.= ' endtDay: '.$row['endDay'];
            $html_read.= '<br/>status: '.$row['u_status'];
            $html_read.= '<br/><br/>';
                $html_read = $html_read.'</li>';
        }
    }else{
        echo "bad";
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}

