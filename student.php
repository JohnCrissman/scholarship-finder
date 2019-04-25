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

                <h4 class="col-12 " style="color:navy;"> Student: John Crissman</h4>
                <div class="col-12">
                        <form action="" method="POST">
                                <div class=" col-5 form-group">
                                    <label for="gpa">GPA: </label>
                                    <input type="number" step=0.1 class="form-control" id="gpa" name="gpa" max=4 min=1 />
                                    <button type="submit" name="search-submit" class="btn btn-warning">Search <i class="fas fa-search"></i></button>
                                </div>
                                <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                <!-- <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button> -->
                        </form>

                </div>


                <div class="col-12">
                    <div>
                        <h3>All Scholarshihps</h3>
                        <p>one scholarship to see</p>
                        <div>
                            <span> Draft of one scholarships </span>
                            <?php echo "Make the call to the function that will show all scholarships based on the selection"; ?>
                            <div class="col-12 all-scholarship">
                            
                                <span style="float:right;">

                                    <form action="" method="POST">
                                            <!-- <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button> -->
                                            <button type="submit" name="like-submit" class="btn btn-success"><i class="far fa-heart"></i></button>
                                            <!-- <button type="submit" name="olike-submit" class="btn btn-danger"><i class="fas fa-heart"></i></button> -->
                                        </form>
                                </span>
                                <div class="col-10">
                                    <p><span>Titulo de la scholarship: </span></p>
                                    <p><span>Sponsor Name: <span></p>
                                    <p><span>Min Requirements: </span></p>
                                    <p><span>GPA Requirements: </span></p>
                                    <p><span>Amount: </span></p>
                                    <p><span> </span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3>Saved</h3>
                        <p>one scholarship on saved</p>
                        <div>
                            <span> Draft of saved scholarships </span>
                            <?php echo "call to the function that shows the saved scholarships based on the student ID" ?>
                            <div class="col-12 saved-scholarship">
                                <span style="float:right;">
                                    <form action="" method="POST">
                                        <button type="submit" name="del-submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </span>
                                <div class="col-10">
                                    <p><span>Titulo de la scholarship: </span></p>
                                    <p><span>Sponsor Name: <span></p>
                                    <p><span>Min Requirements: </span></p>
                                    <p><span>GPA Requirements: </span></p>
                                    <p><span>Amount: </span></p>
                                    <p><span> </span></p>
                                </div>
                            </div>
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