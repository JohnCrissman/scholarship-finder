<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";



if(isset($_POST['log-submit']))
{
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
    if(!empty($_POST['id']) && $id=intval($_POST['id']))
        {
           $sql="select position from Users where userID=$id;";
           $result = $mysqli->query($sql);
       
           if ($result->num_rows>=1){
               while($row=$result->fetch_assoc())
               {
                //    echo '<pre>';
                //    echo var_dump($row);
                //    echo '</pre>';
                   if (strcasecmp($row['position'],'student')==0){
                        $page = 'student';
                   }
                   elseif (strcasecmp($row['position'],'supervisor')==0){
                        $page = 'supervisor';
                   }
                   elseif (strcasecmp($row['position'],'coordinator')==0){
                        $page = 'coordinator';
                   }
                   else{
                       $message = '<p style="color:red;" class="text-center">Your user doesnot exist</p>';
                   }
                   $mysqli->close();
                      header("Location: $page.php?id=$id");       
               }
           }else{
               //there records returned on the query
                   die('Invalid query: ' . $db_handler->error());
                   $message = '<p style="color:red;" class="text-center">Select an user from the list</p>';
           }
        }
    else
        {
            // echo 'enter proper data';
            $message = '<p style="color:red;" class="text-center">Select an user from the list</p>';
        }
}
    
    // get all the users to login
    $sql="select * from Users order by position DESC";
    $result = $mysqli->query($sql);

    $html_read1="";
    $html_read2="";
    $html_read3="";

    if ($result->num_rows>=1){
        while($row=$result->fetch_assoc())
        {
            // echo '<pre>';
            // echo var_dump($row);
            // echo '</pre>';
            $html_read1.= '<option value="'.$row['userID'].'"> ('.$row['position'].') &nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;  '.$row['email'].'</option>';

        }
    }else{
            die('Invalid query: ' . $db_handler->error());
    }
    $all_users= array($html_read1,$html_read2,$html_read3);




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
    <?php echo $message ?>
    <div class="container-fluid">
                    <div class="row">
                        <form class="col-md-7" action="" method="POST">
                            <div class="form-group">
                                <label >Email address</label>
                                <!-- <input name="email" type="email" class="form-control" placeholder="Email..."> -->
                                <select class="custom-select"  name="id" >
                                    <option selected>Select your user</option>
                                    <?php
                                        echo $all_users[0];
                                    ?>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label >Password</label>
                                <input name="pass" type="password" class="form-control"  placeholder="Password">
                            </div> -->
                          
                            <button type="submit" name="log-submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>



    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>

    </body>
</html>