<?php

// All functions or methods to talk to the database will be created here.
// This file will need to be included everytime we want to use any of the methods here created


function show_saved_scholarship_st($db_handler, $userID){
    $html_read = "";
    $sql="call ShowSavesToStudent($userID);";

    $result = $db_handler->query($sql);
    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            $html_read.='<div class="card col-lg-6" >
                                <!-- <img src="..." class="card-img-top" alt="..."> -->
                                <div class="card-body">
                                    <h5 class="card-title">STUDENTS SAVED SCHOLARSHIPS: Titulo de la scholarship</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Sponsor name</h6>
                                    <p class="card-text">Min requirements... bla bla bla...</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Minimum GPA: </li>
                                    <li class="list-group-item">Award: </li>
                                    <li class="list-group-item">Deadline: </li>
                                </ul>
                                <div class="card-body">
                                    <a href="#" class="card-link">Card link</a>
                                    <a href="#" class="card-link">Another link</a>
                                    <form action="" method="POST">
                                        <span style="float:right;">
                                            <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                        </span>
                                    </form>
                                </div>
                            </div>';
        }
    }else{
        die('Invalid query: ' . $db_handler->error());
    }
    return $html_read;
    
}


function show_scholarship_st($db_handler){
    $html_read = "";
    $sql="call ScholarshipAndSponsor;";

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
  
           
            /* 
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
            */
        }
    }else{
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

           $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
                <div class="card-body">
                <form action="" method="POST">
                        <span style="float:right;">
                        <input type="number" value="'. $row['sponsorID'].'" name="sponsorID" readonly hidden>
                        <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
           $html_read.=' <div class="col-lg-5 m-2"> <div class="card" >
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
                    <div class="card-body">
                        <form action="" method="POST">
                                <span style="float:right;">
                                <input type="number" value="'. $row['scholarshipID'].'" name="scholarshipID" readonly hidden>
                                <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                <button type="submit" name="upd-submit" class="btn btn-warning"><i class="far fa-edit"></i></button>
                                <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                                </span>
                        </form>
                        <h5 class="card-title">'. $row['title'].'</h5>
                        <h6 class="card-subtitle mb-2 text-muted">'. $row['spCompanyName'].'</h6>
                        <p class="card-text">Min requirements:  '. $row['minRequirements'].'<br>
                        <p class="card-text">Minimum GPA:  '.number_format((float)$row['gpa'], 2, '.', '').'<br>
                        Award:  $'. $row['amount'].'<br>
                        Deadline:  '. substr($row['deadline'],0,10).'<br>
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