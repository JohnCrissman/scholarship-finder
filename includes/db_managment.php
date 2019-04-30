<?php

// All functions or methods to talk to the database will be created here.
// This file will need to be included everytime we want to use any of the methods here created




//***********************************************************************************************
//  STUDENTS
function show_saved_scholarship_st($db_handler, $userID){
    $html_read = "";
    $sql="CALL ShowSavesToStudent($userID);";

    $result = $db_handler->query($sql);
    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
                $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
                                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                                    <div class="card-body">
                                    <form action="" method="POST">
                                            <span style="float:right;">
                                                <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                <input type="number" value="'. $row['scholarshipID'].'" name="scholarshipID" readonly hidden>
                                                <input type="text" value="'. $row['title'].'" name="title" readonly hidden>
                                                <!-- <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button> -->
                                                <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                                            </span>
                                    </form>
                                    <h5 class="card-title">'. $row['title'].'</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">'. $row['spCompanyName'].'</h6>
                                    <p class="card-text">Min requirements:  '. $row['minRequirements'].'</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Minimum GPA:  '.number_format((float)$row['gpa'], 2, '.', '').'</li>
                                    <li class="list-group-item">Award:  $'. $row['amount'].'</li>
                                    <li class="list-group-item">Deadline:  '. substr($row['deadline'],0,10).'</li>
                                    </ul>
                                    </div>
                            </div>';
        }
    }else{
        die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
    
}

function show_scholarship_st_gpa($db_handler, $my_gpa){
    $html_read = "";
    $sql="SELECT scholarshipID, title, spCompanyName, minRequirements, gpa, amount, deadline from Scholarship s join Sponsor p on s.sponsorID=p.sponsorID and gpa<=$my_gpa";
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
           $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
           <!-- <img src="..." class="card-img-top" alt="..."> -->
           <div class="card-body">
           <form action="" method="POST">
                   <span style="float:right;">
                       <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                       <input type="number" value="'. $row['scholarshipID'].'" name="scholarshipID" readonly hidden>
                       <input type="text" value="'. $row['title'].'" name="title" readonly hidden>
                       <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button>
                       <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                   </span>
           </form>
             <h5 class="card-title">'. $row['title'].'</h5>
             <h6 class="card-subtitle mb-2 text-muted">'. $row['spCompanyName'].'</h6>
             <p class="card-text">Min requirements:  '. $row['minRequirements'].'</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Minimum GPA:  '.number_format((float)$row['gpa'], 2, '.', '').'</li>
             <li class="list-group-item">Award:  $'. $row['amount'].'</li>
             <li class="list-group-item">Deadline:  '. substr($row['deadline'],0,10).'</li>
           </ul>
           </div>
   </div>';

        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}

function show_scholarship_st($db_handler){
    // type = 0 show all no filter
    // type = 1 show all with gpa filter

    $html_read = "";
    // $sql="call ScholarshipAndSponsor();";
  $sql="SELECT s.scholarshipID, title, spCompanyName, minRequirements, gpa, amount, deadline from Scholarship s join Sponsor p on s.sponsorID=p.sponsorID";

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
           $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
           <!-- <img src="..." class="card-img-top" alt="..."> -->
           <div class="card-body">
           <form action="" method="POST">
                   <span style="float:right;">
                       <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                       <input type="number" value="'. $row['scholarshipID'].'" name="scholarshipID" readonly hidden>
                       <input type="text" value="'. $row['title'].'" name="title" readonly hidden>
                       <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button>
                       <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                   </span>
           </form>
             <h5 class="card-title">'. $row['title'].'</h5>
             <h6 class="card-subtitle mb-2 text-muted">'. $row['spCompanyName'].'</h6>
             <p class="card-text">Min requirements:  '. $row['minRequirements'].'</p>
           </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Minimum GPA:  '.number_format((float)$row['gpa'], 2, '.', '').'</li>
             <li class="list-group-item">Award:  $'. $row['amount'].'</li>
             <li class="list-group-item">Deadline:  '. substr($row['deadline'],0,10).'</li>
           </ul>
           </div>
   </div>';
        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}

function deleteSavedScholarship_st($db_handler, $scholarshipID, $userID){
    // implement this
    
    $sql="DELETE from StudentSaves where studentID = $userID and scholarshipID = $scholarshipID";

    $result = $db_handler->query($sql);
    echo '<pre>';
    var_dump($result);
    echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function saveScholarship_st($db_handler, $scholarshipID, $userID){
// implement this

    $sql="INSERT INTO StudentSaves (studentID, scholarshipID,dateSaved) VALUES ($userID, $scholarshipID,NOW());";
    // echo $sql;
    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
    return $res;
}


//***********************************************************************************************
//  LOGIN
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


//***********************************************************************************************
//  COORDINATOR


function show_sponsor_co($db_handler){
    $html_read = "";
    $sql="SELECT * FROM Sponsor;";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // var_dump($row);
            // echo '</pre>';

           $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
                <div class="card-body">
                <form action="" method="POST">
                        <span style="float:right;">
                            <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                            <input type="number" value="'. $row['sponsorID'].'" name="sponsorID" readonly hidden>
                            <button type="submit" name="upd-submit" class="btn btn-warning"><i class="far fa-edit"></i></button>
                            <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                        </span>
                </form>
                    <h5 class="card-title">'. $row['spCompanyName'].'</h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Agent: '. $row['spAgentName'].'</h6>
                    <p class="card-text">Phone: '. $row['spPhone'].'</p>
                    <p class="card-text">Email: '. $row['spEmail'].'</p>
                    <p class="card-text">URL: '. $row['spURL'].'</p>
                </div>
                </div>
                </div>';
          }
    }else{
        echo 'there is nothing';
    }
    return $html_read;
}








//***********************************************************************************************
//  SUPERVISOR
function show_sponsor_su($db_handler){
    $html_read = "";
    $sql="SELECT * FROM Sponsor;";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // var_dump($row);
            // echo '</pre>';

           $html_read.=' <div id="sp-'. $row['sponsorID'].'" class="col-lg-5 m-2"> <div class="card" >
                <div class="card-body">
                <form action="" method="POST">
                        <span style="float:right;">
                        <input type="text" value="'. $row['spCompanyName'].'" name="name" readonly hidden>
                        <input type="number" value="'. $row['sponsorID'].'" name="sponsorID" readonly hidden>
                        <button type="submit" name="sp-del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                        </span>
                        </form>
                    <button type="submit" name="sp-upd-submit" class="btn btn-warning" onclick="populate_modal_Sp(\'sp-'.$row['sponsorID'].'\')" data-toggle="modal" data-target="#editSponsor"><i class="far fa-edit"></i></button>
                    <h5 class="card-title">'. $row['spCompanyName'].'</h5>
                    <h6 class="card-subtitle mb-2 text-muted"> Agent: <span>'. $row['spAgentName'].'</span></h6>
                    <p class="card-text">Phone: <span>'. $row['spPhone'].'</span><br>
                    Email: <span>'. $row['spEmail'].'</span><br>
                    URL: <span>'. $row['spURL'].'</span></p>
                </div>
                </div>
                </div>';
          }
    }else{
        echo 'there is nothing';
    }
    return $html_read;
}


function show_scholarship_co_su($db_handler){
    $html_read = "";
    // $sql="call SchAndSpForSupervisor();";
    $sql="select * from Scholarship sc join Sponsor sp on sc.sponsorID=sp.sponsorID;";

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
           $html_read.=' <div id="sch-'. $row['scholarshipID'].'" class="col-lg-5 m-2"> <div class="card" >
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <form action="" method="POST">
                                <span style="float:right;">
                                <input type="number" value="'. $row['scholarshipID'].'" name="scholarshipID" readonly hidden>
                                <input type="text" value="'. $row['title'].'" name="title" readonly hidden>
                                <button type="submit" name="sch-del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                                </span>
                                </form>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editScholarship" onclick="populate_modal(\'sch-'. $row['scholarshipID'].'\')"><i class="far fa-edit"></i></button>
                        <h5 class="card-title">'. $row['title'].'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'. $row['spCompanyName'].'</h6>
                        <p class="card-text">Min requirements:  <span>'. $row['minRequirements'].'</span><br>
                        <p class="card-text">Minimum GPA:  <span>'.number_format((float)$row['gpa'], 2, '.', '').'</span><br>
                        Award:  $<span>'. $row['amount'].'</span><br>
                        Deadline:  <span>'. substr($row['deadline'],0,10).'</span><br>
                        Apply url: <a href="">'.$row['applyURL'].'</a></p>

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Registration Day:  '.$row['regDay'].'</li>
                    </ul>
                    </div>
                    </div>';
        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}

function show_coordinators_su($db_handler){
    $html_read = "";
    // $sql="call SchAndSpForSupervisor();";
    $sql="SELECT * from Users where position= 'coordinator';";
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
           $html_read.=' <div id="coo-'. $row['userID'].'" class="col-lg-5 m-2"> <div class="card" >
                    <div class="card-body">
                        <form action="" method="POST">
                                <span style="float:right;">
                                <input type="text" value="'. $row['lastName'].'" name="lastName" readonly hidden>
                                <input type="text" value="'. $row['firstName'].'" name="firstName" readonly hidden>
                                <input type="number" value="'. $row['userID'].'" name="UserID" readonly hidden>
                                <button type="submit" name="coo-del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                                </span>
                                </form>
                                <button class="btn btn-warning" data-toggle="modal" data-target="#editCoordinator" onclick="populate_modal_C(\'coo-'. $row['userID'].'\')"><i class="far fa-edit"></i></button>
                        <p class="card-text">Full Name: <span>'. $row['firstName'].'</span>&nbsp;<span>'. $row['lastName'].' </span><br>
                            Email: <span>'.$row['email'].'</span></p>

                    </div>
                    <div class="card-footer">
                        Registration Day:  '.$row['startDay'].'
                    </div>
                    </div>
                    </div>';
        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}


function show_students_su($db_handler){
    $html_read = "";
    // $sql="call SchAndSpForSupervisor();";
    $sql="SELECT * from Users where position= 'student';";
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
           $html_read.=' <div id="st-'. $row['userID'].'" class="col-lg-5 m-2"> <div class="card" >
                    <div class="card-body">
                        <p class="card-text">Full Name: <span>'. $row['firstName'].'</span>&nbsp;<span>'. $row['lastName'].'</span><br>
                            Email: <span>'.$row['email'].'</span></p>
                    </div>
                    <div class="card-footer">
                        Registration Day:  '.$row['startDay'].'
                    </div>
                    </div>
                    </div>';
        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
}


function updateScholarship($db_handler,$sch){
    // complete this  
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    $id = $sch["id"];
    $title = $sch["title"];
    $deadline = $sch["deadline"];
    $award = $sch["award"];
    $gpa = $sch["gpa"];
    $sql="UPDATE Scholarship SET title='$title', deadline= '$deadline', amount= $award, gpa=$gpa where scholarshipID = $id;";
    // echo $sql;
    $result = $db_handler->query($sql);

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function deleteScholarship($db_handler,$id){
    $sql="DELETE from Scholarship where scholarshipID = $id;";
    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function updateSponsor($db_handler,$sp){
    // complete this  
    $id = $sp["id"];
    $name = $sp["name"];
    $agent = $sp["agent"];
    $phone = $sp["phone"];
    $email = $sp["email"];
    $sponsorUrl = $sp["sponsorUrl"];
    $sql="UPDATE Sponsor SET spCompanyName='$name', spAgentName = '$agent', spPhone='$phone', spEmail='$email', spURL='$sponsorUrl' where sponsorID = $id;";
    echo $sql;
    $result = $db_handler->query($sql);
    echo '<pre>';
    var_dump($result);
    echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function deleteSponsor($db_handler,$id){
    $sql="DELETE from Sponsor where sponsorID = $id";
    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function updateCoordinator($db_handler,$coo){
    // complete this  
    $id = $coo['id'];
    $firstName = $coo['firstName'];
    $lastName = $coo['lastName'];
    $email = $coo['email'];
    
    $sql="UPDATE Users SET email='$email', firstName='$firstName', lastName='$lastName' where userID = $id;";

    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function deleteCoordinator($db_handler,$id){
    $sql="DELETE from Users where userID = $id";
    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;
}

function addCoordinator($db_handler,$coo){

    $firstName = $coo['firstName'];
    $lastName = $coo['lastName'];
    $email = $coo['email'];
    
    $sql="INSERT INTO Users (email, position, firstName, lastName,startDay) VALUES ('$email','coordinator', '$firstName', '$lastName',NOW());";

    // echo $sql;
    $result = $db_handler->query($sql);
    // echo '<pre>';
    // var_dump($result);
    // echo '</pre>';

    if ($result){
        $res = 'SUCCESS';
    }
    else{
        $res = 'FAILURE';
    }
        return $res;


}