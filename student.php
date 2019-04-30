<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";


$my_userID = intval($_GET['id']);
$my_fullName = htmlentities($_GET['first']).'&nbsp;'.htmlentities($_GET['last']);
$my_email = htmlentities($_GET['email']);
$searchResults = $message = '';
if(isset($_POST['search-submit']))
{

    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if(!empty($_POST['gpa']) )
        {
            $my_gpa = floatval($_POST['gpa']);
            $searchResults = '<div class="col-12">
                                <h3>All Scholarships</h3>
                                <p style="color:orange;">Scholarships which require a GPA of <b>'.number_format((float)$my_gpa, 2, '.', '').'</b> or less.</p>
                                <p>to like a scholarship click on the trash icon</p>
                                <div class="row">'.
                                    show_scholarship_st_gpa($mysqli,$my_gpa)
                                .'</div>
                            </div>';
            
        //    echo 'search using gpa';
        }
    else
        {
            $searchResults = '<div class="col-12">
                                <h3>All Scholarships</h3>
                                <p>to like a scholarship click on the trash icon</p>
                                <div class="row">'.
                                    show_scholarship_st($mysqli)
                                .'</div>
                            </div>';
            

            // echo 'search without using gpa';
        }
}else if(isset($_POST['del-submit'])){
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    
    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['title']).'</b> deleted with '.deleteSavedScholarship_st($mysqli,intval($_POST['scholarshipID']),$my_userID).'.</p>';
    // echo 'delete saved scholarship from the database';


}else if(isset($_POST['like-submit'])){
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    
    $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['title']).'</b> saved with '.saveScholarship_st($mysqli,intval($_POST['scholarshipID']),$my_userID).'.</p>';
    // echo 'save a new record on the database';
}

$scholarshipIlike = show_saved_scholarship_st($mysqli, $my_userID);


?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> SchF - Student </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Student</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main class="main-body">
        <?php echo $message; ?>
        <h4 style="color:navy;"><?php echo $my_fullName ?></h4><span class="text-muted">(Student)</span>
        <p></p>
        <div class="container-fluid">
            <div class="row">
                <ul class=" col-12 nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#search-all-scholarship" role="tab" data-toggle="tab">Show All</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-all-saved" role="tab" data-toggle="tab">Saved</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#search-gpa-scholarship" role="tab" data-toggle="tab">Search (All | by GPA)</a>
                    </li>
                </ul>

                
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="search-all-scholarship">    
                        <?php
                            if (empty($searchResults))
                            {
                                echo '<div class="col-12">
                                    <h3>All Scholarships</h3>
                                    <p>to like a scholarship click on the trash icon</p>
                                    <div class="row">
                                    </div> 
                                    </div>';
                            }else{
                                echo $searchResults;
                            }
                        ?>
                    </div>
                    <div role="tabpanel" class="tab-pane fade " id="search-gpa-scholarship">
                        <div class="card col-lg-9">
                            <div class="card-body">
                                <h5 class="card-title">Search</h5>
                                <h6 class="card-subtitle mb-2 text-muted">by GPA</h6>
                                <p class="card-text">If you wish to search for scholarships based on the minimum GPA accepted.  Please input your gpa.  Otherwhise, all available scholarships will be shown.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <form action="" method="POST" class=" form-inline my-2 my-lg-0">
                                        <div class=" form-group">
                                            <label for="gpa"> Minimum GPA:&nbsp;&nbsp;</label>
                                            <input class="form-control " type="number" step=0.1 name="gpa" name="gpa" max=4 min=1 />
                                        </div>
                                        <span class="col-auto" style="float: right;">
                                                <button type="submit" name="search-submit" class="btn btn-warning my-2 my-sm-0">Search <i class="fas fa-search"></i></button>
                                        </span>
                                        <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                        <!-- <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button> -->
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="show-all-saved">
                        <div class="col-12">
                            <h3>All saved Scholarships</h3>
                            <p>to dislike a scholarship click on the trash icon</p>
                            <div class="row">                            
                                <?php
                                echo $scholarshipIlike;
                                // echo "show saved scholarships"; 
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </div>
    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>