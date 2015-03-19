<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "PHP & SQL Project";
$description = "This project is made to practice PHP user permissions as well as viewing adding and deleting elements in a table via SQL";
include_once "includes/html_header.php";

?>

<!-- ====================================== -->
<!-- CODE FOR THIS PAGE -->

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1><?php echo $heading ?></h1>
        <h2>Logged in as: <strong><?php echo "{$_SESSION["username"]}" ?> <?php  echo "({$_SESSION["permissions"]})" ?></strong></h2>
        <p><?php echo $description ?></p>

        <p><a class="btn btn-primary btn-lg" href="login.php" role="button">Log In &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        
      </div>

    </div>
      
      <hr>

<!-- ===================================================== -->
<!-- FOOTER -->

<?php

include_once "includes/footer.php";

?>

