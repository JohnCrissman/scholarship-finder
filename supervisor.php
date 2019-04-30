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

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="show-all-scholarships">
                        <h2> Scholarships </h2>
                    <!-- new code here -->
                    

                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-sponsors">
                        <h2> sponsors </h2>
                        <!-- new code here -->


                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-coordinators">
                        <h2> coordinators </h2>
                        <!-- new code here -->


                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-students">
                        <h2> students </h2>
                        <!-- new code here -->


                    </div>                    
                </div>
            </div>
        </div>
    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>