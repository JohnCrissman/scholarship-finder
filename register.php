<?php 
require_once "includes/db_managment.php";

/* Logic of the register here */

if(isset($_POST['submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if(!empty($_POST['firstName']) && !empty($_POST['lastName']) && !empty($_POST['email']) && !empty($_POST['pass']))
        {

            
           echo 'registered';
            // $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> added with ' . insert_toDB($mysqli,$new_item).'</p>';
        }
    else
        {


            echo 'enter proper data';
            // $message = '<p style="color:red;" class="text-center">to add an item you need to fill up the information</p>';
        }
}






require_once "includes/server.php";
?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> SchF - Register </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Register</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main class="main-body">
    <div class="container-fluid">
                    <div class="row">
                        <form class="col-md-7" action="" method="POST">
                            <div class="form-group">
                                <label >First Name</label>
                                <input name="firstName" type="text" class="form-control" placeholder="first name...">
                                <label >Lastname</label>
                                <input name="lastName" type="text" class="form-control" placeholder="last name...">
                            </div>
                            <div class="form-group">
                                <label >Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email...">
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input name="pass" type="password" class="form-control"  placeholder="Password">
                                <label >Confirm Password</label>
                                <input type="password" class="form-control"  placeholder="Confirm Password">
                            </div>
                          
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>










    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>