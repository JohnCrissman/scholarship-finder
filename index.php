<?php 
require_once "includes/db_managment.php";
require_once "includes/server.php";
?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> Scholarship Finder </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Scholarship Finder</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main>

    <!-- <a role="button" href="register.php" class="btn btn-primary">register</a> -->
<a role="button" href="login.php" class="btn btn-secondary">login</a>
<a role="button" href="student.php" class="btn btn-success">Student</a>
<a role="button" href="supervisor.php" class="btn btn-danger">Supervisor</a>
<a role="button" href="coordinator.php" class="btn btn-warning">Coordinator</a>
<!-- <a role="button" href=".php" class="btn btn-info">Info</a> -->

<?php

        echo greeting("Marianela");
        echo '<hr/>';
        echo '<h2>Users</h2>';
        echo show_users($mysqli);
        echo '<hr/>';
        echo '<h2>Scholarships</h2>';
        echo show_scholarship($mysqli);
        echo '<h2>Sponsors</h2>';
        echo show_sponsor($mysqli);



?>











    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>