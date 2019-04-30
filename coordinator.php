<?php 
require_once "includes/db_managment.php";

/* Logic of the register here */








require_once "includes/server.php";
?>
<!DOCTYPE html>
    <head>
        <?php include_once("includes/headConfig.inc.php")?>
         <title> SchF - Coordinator </title>
    </head>
    <body>
    <header>
        <h1 class="text-center">Coordinator</h1>
        <?php include_once("includes/navigation.inc.php")?>
    </header>

    <!-- ########################### START OF THE BODY CONTENT ################## -->
    <main class="main-body">
        <h4 style="color:navy;"><?php echo $_GET['first'].'&nbsp;'.$_GET['last'] ?></h4><span class="text-muted">(Coordinator)</span>
        <p></p>
        <div class="container-fluid">
            <div class="row">
                <ul class=" col-12 nav nav-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#show-all-scholarships" role="tab" data-toggle="tab">Scholarships</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-sponsors" role="tab" data-toggle="tab">Sponsors</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade show active" id="show-all-scholarships">
                        <h2> Scholarships </h2>
                        <?php
                                // echo show_scholarship_su();
                                
                        ?>
                    

                    </div>
                    <div role="tabpanel" class="tab-pane fade show" id="show-sponsors">
                        <h2> Sponsors </h2>
                        <?php
                                // echo show_sponsor();
                                
                        ?>


                    </div>                    
                </div>
            </div>
        </div>
    </main>
    <!-- ########################### END OF THE BODY CONTENT ################### -->
    <?php include("includes/footer.inc.php"); ?>
    </body>
</html>