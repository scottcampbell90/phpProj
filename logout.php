<?php

include_once "includes/html_top.php";
session_start();
$_SESSION = array();

//DESTROY SESSION COOKIE
	        
if(isset($_COOKIE[session_name()])){
	setcookie(session_name(), "", time(), -4200, "/");
}

// DESTROY SESSION
session_destroy();
      
// Temporary line of code for testing. Comment out this line with // after everything else on this page is working.

//echo "Ready to forward back to login page...";

/* 6. Please DO NOT enter code in this step until the instructions tell you to. Enter one line of code that returns to the login.php page and sends a URL variable 
      named 'logout' with a value of 1 (one). Please use the code shown in Part 1 (Step 3 #4b). */ 

header("Location: login.php?logout=1");

/* 7. OPEN your login.php page, and FIND the section labeled '8. The "Successfully logged out" message will go between the php tags below...'. 
   Inside that section, insert an 'if' block that checks to see if the "logout" session variable is set *and* that its value is 1 (one). Please use the
   code shown in Part 1 (Step 3 #4f).
*/
?>

<div class="jumbotron">
<div class="container">

<?php
include_once "includes/php_header.php";
include_once "includes/html_top.php";
include_once "includes/html_header.php";
echo "<h3>You have logged out. <a href='login.php'>Click here</a> to log in.</h3>";

?>

</div>
</div>


<?php 


include_once "footer.php";
// NOTE: No include files are needed by this page.

?>