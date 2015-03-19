<?php

include_once "includes/html_top.php";
$heading = "";
include_once "includes/php_header.php";
include_once "includes/html_header.php";
// ======================================
//CODE FOR THIS PAGE
?>


<div class="container">
<?php
if(!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] != true) {
     echo "<h3 id='login'>You need to <a href='login.php'>log in</a> before you can access this content.</h3>";
     exit;
}

?>
</div>
