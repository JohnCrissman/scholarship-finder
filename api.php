<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";

/* Logic of the supervisor here */

// echo file_get_contents('php://input');
$data=json_decode(file_get_contents('php://input'), true);


$my_fullName = htmlentities($data['first']).'&nbsp;'.htmlentities($data['last']);
$my_email = htmlentities($data['email']);
$searchResults = $message = '';
if(isset($data['mari'])){
    $arr = array('a' => 'test', 'mari' => 'bella', 'c' => array(3,5,8,9,10), 'd' => 4, 'e' => 5);
    echo json_encode($arr);

}else if(isset($data['all-sponsors'])){
    $sql="SELECT * FROM Sponsor;";
    $result = $mysqli->query($sql);
    
    echo json_encode($result->fetch_all());

}else if(isset($data['sch-upd-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'update the scholarship';

    $sch["id"] = intval($data['id']);
    $sch["title"] = htmlentities($data["title"]);
    $sch["deadline"] = htmlentities($data["deadline"]);
    $sch["award"] = intval($data["award"]);
    $sch["gpa"] = intval($data["gpa"]);

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['title']).'</b> updated with '.updateScholarship($mysqli,$sch).'</p>';

}else if(isset($data['sch-del-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'delete the scholarship';


    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['title']).'</b> deleted with '.deleteScholarship($mysqli,intval($data['scholarshipID'])).'.</p>';
}else if(isset($data['sp-upd-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'update the sponsor';

    $sp["id"] = intval($data['id']);
    $sp["name"] = htmlentities($data["name"]);
    $sp["agent"] = htmlentities($data["agent"]);
    $sp["phone"] = htmlentities($data["phone"]);
    $sp["email"] = htmlentities($data["email"]);
    $sp["sponsorUrl"] = htmlentities($data["sponsorUrl"]);

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['name']).'</b> updated with '.updateSponsor($mysqli,$sp).'</p>';

}else if(isset($data['sp-del-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'delete the sponsor';

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['name']).'</b> deleted with '.deleteSponsor($mysqli,intval($data['sponsorID'])).'</p>';

}else if(isset($data['coo-upd-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'update the coordinator';

    $coo['id'] = $data['id'];
    $coo['firstName'] = $data['firstName'];
    $coo['lastName'] = $data['lastName'];
    $coo['email'] = $data['email'];

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['firstName']).'&nbsp;'.htmlentities($data['lastName']).'</b> updated with '.updateCoordinator($mysqli,$coo).'</p>';

}else if(isset($data['coo-del-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'delete the coodinator';
    
    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['firstName']).'&nbsp;'.htmlentities($data['lastName']).'</b> deleted with '.deleteCoordinator($mysqli,intval($data['UserID'])).'</p>';
}else if(isset($data['coo-add-submit']))
{
    // echo '<pre>';
    // var_dump($data);
    // echo '</pre>';
    // echo 'add the coodinator';

    $coo['firstName'] = $data['firstName'];
    $coo['lastName'] = $data['lastName'];
    $coo['email'] = $data['email'];

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($data['firstName']).'&nbsp;'.htmlentities($data['lastName']).'</b> added with '.addCoordinator($mysqli,$coo).'</p>';


}else{
    echo 'nice try';
    echo 'allSponsors';
}

