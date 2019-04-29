<?php 
require_once "includes/db_managment.php";

/* Logic of the register here */








require_once "includes/server.php";
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
    <h4 style="color:navy;"><?php echo $_GET['first'].'&nbsp;'.$_GET['last'] ?></h4><span class="text-muted">(Supervisor)</span>
        <div class="container-fluid">
            <div class="row">
                <h2> Scholarships </h2>
                <!-- new code here -->
                

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <h2> title h2 </h2>
                <!-- new code here -->
                

            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <h2> title h2 </h2>
                <!-- new code here -->
                

            </div>
        </div>
    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>