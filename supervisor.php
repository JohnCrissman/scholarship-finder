<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";

/* Logic of the supervisor here */

$my_userID = intval($_GET['id']);
$my_fullName = htmlentities($_GET['first']).'&nbsp;'.htmlentities($_GET['last']);
$my_email = htmlentities($_GET['email']);
$searchResults = $message = '';


if(isset($_POST['sch-upd-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'update the scholarship';

    $sch["id"] = intval($_POST['id']);
    $sch["title"] = htmlentities($_POST["title"]);
    $sch["deadline"] = htmlentities($_POST["deadline"]);
    $sch["award"] = intval($_POST["award"]);
    $sch["gpa"] = intval($_POST["gpa"]);
    $sch["sponsorID"] = intval($_POST["sponsorID"]);
    $sch["minReq"] = htmlentities($_POST["minReq"]);

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['title']).'</b> updated with '.updateScholarship($mysqli,$sch).'</p>';

}else if(isset($_POST['sch-del-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'delete the scholarship';


    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['title']).'</b> deleted with '.deleteScholarship($mysqli,intval($_POST['scholarshipID'])).'.</p>';
}else if(isset($_POST['sp-upd-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'update the sponsor';

    $sp["id"] = intval($_POST['id']);
    $sp["name"] = htmlentities($_POST["name"]);
    $sp["agent"] = htmlentities($_POST["agent"]);
    $sp["phone"] = htmlentities($_POST["phone"]);
    $sp["email"] = htmlentities($_POST["email"]);
    $sp["sponsorUrl"] = htmlentities($_POST["sponsorUrl"]);

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> updated with '.updateSponsor($mysqli,$sp).'</p>';

}else if(isset($_POST['sp-del-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'delete the sponsor';

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> deleted with '.deleteSponsor($mysqli,intval($_POST['sponsorID'])).'</p>';

}else if(isset($_POST['coo-upd-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'update the coordinator';

    $coo['id'] = $_POST['id'];
    $coo['firstName'] = $_POST['firstName'];
    $coo['lastName'] = $_POST['lastName'];
    $coo['email'] = $_POST['email'];

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['firstName']).'&nbsp;'.htmlentities($_POST['lastName']).'</b> updated with '.updateCoordinator($mysqli,$coo).'</p>';

}else if(isset($_POST['coo-del-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'delete the coodinator';
    
    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['firstName']).'&nbsp;'.htmlentities($_POST['lastName']).'</b> deleted with '.deleteCoordinator($mysqli,intval($_POST['UserID'])).'</p>';
}else if(isset($_POST['coo-add-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    // echo 'add the coodinator';

    $coo['firstName'] = $_POST['firstName'];
    $coo['lastName'] = $_POST['lastName'];
    $coo['email'] = $_POST['email'];

    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['firstName']).'&nbsp;'.htmlentities($_POST['lastName']).'</b> added with '.addCoordinator($mysqli,$coo).'</p>';


}


$allScholarships = show_scholarship_co_su($mysqli);
$allSponsors = show_sponsor_su($mysqli);
$allCoordinators = show_coordinators_su($mysqli);
$allStudents = show_students_su($mysqli);


?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> SchF - Supervisor </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Supervisor</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main class="main-body">
        <?php echo $message ?>
        <h4 style="color:navy;"><?php echo $_GET['first'].'&nbsp;'.$_GET['last'] ?></h4><span class="text-muted">(Supervisor)</span>
        <p></p>
        <div class="container-fluid">
            <div class="row">
                <ul class=" col-12 nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#show-all-scholarships" role="tab" data-toggle="tab">Scholarships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-sponsors" role="tab" data-toggle="tab">Sponsors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-coordinators" role="tab" data-toggle="tab">Coordinators</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-students" role="tab" data-toggle="tab">Students</a>
                    </li>
                </ul>

                <div class="col-12 tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="show-all-scholarships">
                        <h2> Scholarships </h2>
                        <?php
                        echo '<div class="col-12">
                        <p>Modify or Delete</p>
                        <div class="row">'.
                         $allScholarships
                         .'</div> 
                        </div>';

                        ?>
                        
                        
                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-sponsors">
                        <h2> Sponsors </h2>
                        <?php
                        echo '<div class="col-12">
                        <p>Modify or Delete</p>
                        <div class="row">'.
                         $allSponsors
                         .'</div> 
                        </div>';

                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-coordinators">
                        <h2> Coordinators </h2>
                        <?php
                           echo '<div class="col-12">
                           <p>Modify or Delete</p>
                           <div class="row">'.
                            $allCoordinators
                            .'</div> 
                           </div>';
                                
                        ?>


                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-students">
                        <h2> Students </h2>
                        <?php
                          echo '<div class="col-12">
                          <p>Modify or Delete</p>
                          <div class="row">'.
                           $allStudents
                           .'</div> 
                          </div>';
                                
                        ?>


                    </div>                    
                </div>
            </div>
            <div class="row">
                <div class="modal fade" id="editScholarship" role="dialog">
                
                </div>
                <div class="modal fade" id="editSponsor" role="dialog">
                    
                </div>
                <div class="modal fade" id="editCoordinator" role="dialog">
                    
                </div>
            </div>
        </div>
    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    <script>

    </script>
    </body>
</html>