<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";

if(isset($_POST['submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if(!empty($_POST['email']) && !empty($_POST['pass']))
        {

            
           echo 'check if the person exists, if it does, redirect to his homepage (redirect(student or coordinator or supervisor).  If it doesnot exist let them know or send them to register.';
            // $message = '<p style="color:green;" class="text-center"> <b>'.htmlentities($_POST['name']).'</b> added with ' . insert_toDB($mysqli,$new_item).'</p>';
        }
    else
        {


            echo 'enter proper data';
            // $message = '<p style="color:red;" class="text-center">to add an item you need to fill up the information</p>';
        }
}

?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> SchF - Login </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Login</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main class="main-body">

    <div class="container-fluid">
                    <div class="row">
                        <form class="col-md-7" action="" method="POST">
                            <div class="form-group">
                                <label >Email address</label>
                                <input name="email" type="email" class="form-control" placeholder="Email...">
                            </div>
                            <div class="form-group">
                                <label >Password</label>
                                <input name="pass" type="password" class="form-control"  placeholder="Password">
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