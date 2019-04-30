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
                function populate_modal($id){
                    let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(4),
                        title : elemento.querySelector('div div h5').innerText,
                        minRequirements: elemento.querySelectorAll('div div p span')[0].innerText,
                        gpa: parseFloat(elemento.querySelectorAll('div div p span')[1].innerText),
                        award: parseInt(elemento.querySelectorAll('div div p span')[2].innerText),
                        deadline: elemento.querySelectorAll('div div p span')[3].innerText,
                        applyUrl: elemento.querySelector('div div p a').innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Scholarship</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >Scholarship Title</label>
                                        <input name="title" type="text" class="form-control"  value="${old_info['title']}">
                                        <label >Deadline</label>
                                        <input name="deadline" type="date" class="form-control" value="${old_info['deadline']}">
                                        <label >Minimum Requirements</label>
                                        <textArea class="form-control" value=""> ${old_info['minRequirements']} </textArea>
                                        <label >Award</label>
                                        <input name="award" type="number" class="form-control" value="${old_info['award']}">
                                        <label >Minimum GPA</label>
                                        <input name="gpa" type="number" step="0.1" class="form-control" value="${old_info['gpa']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="sch-upd-submit" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editScholarship').innerHTML = modal;
                }

            function populate_modal_Sp($id){
                let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(3),
                        name: elemento.querySelector('div div h5').innerText ,
                        agent: elemento.querySelector('div div h6 span').innerText,
                        phone: elemento.querySelectorAll('div div p span')[0].innerText,
                        email: elemento.querySelectorAll('div div p span')[1].innerText,
                        sponsorUrl: elemento.querySelectorAll('div div p span')[2].innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Sponsor</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >Sponsor name</label>
                                        <input name="name" type="text" class="form-control"  value="${old_info['name']}">
                                        <label >Agent full name</label>
                                        <input name="agent" type="text" class="form-control" value="${old_info['agent']}">
                                        <label >Phone</label>
                                        <input name="phone" type="text" class="form-control" value="${old_info['phone']}">
                                        <label >Email</label>
                                        <input name="email" type="text" class="form-control" value="${old_info['email']}">
                                        <label >Sponsor URL</label>
                                        <input name="sponsorUrl" type="text" class="form-control" value="${old_info['sponsorUrl']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="sp-upd-submit" class="btn btn-primary" value="Save">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editSponsor').innerHTML = modal;
            }

            function populate_modal_C($id){
                let elemento=document.getElementById($id);                    console.log(elemento);
                    let old_info = {
                        id: $id.substring(4),
                        first : elemento.querySelectorAll('div div p span')[0].innerText,
                        last: elemento.querySelectorAll('div div p span')[1].innerText,
                        email: elemento.querySelectorAll('div div p span')[2].innerText
                    }
                    console.log(old_info);
                    var modal = `<div class="modal-dialog" align="left">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Coordinator</h4>
                            </div>
                            <div class="modal-body">
                                <p>You can only modify these parameters:</p>
                                <form action="" method="POST" >
                                    <div class="form-group">
                                        <input name="id" type="number" value="${old_info['id']}" hidden readonly>
                                        <label >First Name</label>
                                        <input name="firstName" type="text" class="form-control" value="${old_info['first']}">
                                        <label >Phone</label>
                                        <input name="lastName" type="text" class="form-control" value="${old_info['last']}">
                                        <label >Email</label>
                                        <input name="email" type="text" class="form-control" value="${old_info['email']}">
                                    </div>
                                    <p class="small">All information correct?</p>
                                    <input type="submit" name="coo-upd-submit" class="btn btn-success" value="Save">
                                    <input type="submit" name="coo-add-submit" class="btn btn-primary" value="Create a New">
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>`;
                    document.querySelector('#editCoordinator').innerHTML = modal;
            }
        
    </script>
    </body>
</html>