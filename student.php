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

        <div class="container-fluid">
            <div class="row">
                <h4 class="col-12 " style="color:navy;"> Student: <?php echo $_GET['first'].'&nbsp;'.$_GET['last'] ?></h4>
                <div class="card col-8" >
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                              <h5 class="card-title">Search</h5>
                              <h6 class="card-subtitle mb-2 text-muted">by GPA</h6>
                              <p class="card-text">If you wish to search for scholarships based on the minimum GPA accepted.  Please input your gpa.  Otherwhise, all available scholarships will be shown.</p>
                            </div>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item">
                                  <form action="" method="POST">
                                          <div class="col-lg-6 form-group">
                                              <label for="gpa"> Minimum GPA: </label>
                                              <input type="number" step=0.1 class="form-control" id="gpa" name="gpa" max=4 min=1 />
                                              <span style="float: right;">
                                                <button type="submit" name="search-submit" class="btn btn-warning">Search <i class="fas fa-search"></i></button>
                                              </span>
                                          </div>
                                          <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                          <!-- <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button> -->
                                  </form>
                              </li>
                            </ul>
                            <!-- <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                               
                            </div> -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div>
                        <h3>All Scholarshihps</h3>
                        <p>one scholarship to see</p>
                        <div class="row">                            
                            <?php
                            echo show_scholarship_st($mysqli);
                            echo "Make the call to the function that will show all scholarships based on the selection"; 
                            ?>
                        </div>
                    </div>
                    <div>
                        <h3>Saved</h3>
                        <p>one scholarship on saved</p>
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