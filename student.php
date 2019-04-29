<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";



if(isset($_POST['search-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if(!empty($_POST['gpa']) )
        {

            
           echo 'search using gpa';
            // $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> added with ' . insert_toDB($mysqli,$new_item).'</p>';
        }
    else
        {


            echo 'search without using gpa';
            // $message = '<p style="color:red;" class="text-center">to add an item you need to fill up the information</p>';
        }
}else if(isset($_POST['del-submit'])){
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    
    echo 'delete saved scholarship from the database';
    // $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> deleted with '.delete_fromDB($mysqli,intval($_POST['itemId'])).'.</p>';
}else if(isset($_POST['like-submit'])){
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    
    echo 'save a new record on the database';
    // $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> deleted with '.delete_fromDB($mysqli,intval($_POST['itemId'])).'.</p>';
}

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

        <h4 style="color:navy;"><?php echo $_GET['first'].'&nbsp;'.$_GET['last'] ?></h4><span class="text-muted">(Student)</span>
        <p></p>
        <div class="container-fluid">
            <div class="row">
                <div class="card col-lg-9" >
                    <!-- <img src="..." class="card-img-top" alt="..."> -->
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
            <div class="row">
                <div class="col-12">
                    <div>
                        <h3>All Scholarships</h3>
                        <p>to like a scholarship click on the trash icon</p>
                        <div class="row">                            
                            <?php
                            echo show_scholarship_st($mysqli);
                            echo "Make the call to the function that will show all scholarships based on the selection"; 
                            ?>
                        </div>
                    </div>
                    <div>
                        <h3>All saved Scholarshihps</h3>
                        <p>to dislike a scholarship click on the trash icon</p>
                        <div class="row">                            
                            <?php
                            echo show_saved_scholarship_st($mysqli);
                            echo "show saved scholarships"; 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
      </div>






<?php   ?>











    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>