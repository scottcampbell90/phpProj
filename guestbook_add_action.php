<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "Guest Book Add Action Page";

// ==========================================================
// ARRAYS OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
$form_fields=array();
$form_fields["username"]="select";
$form_fields["comment"]="textarea";

// ==========================================================
// FUNCTIONS & HEADER

include_once "includes/cas225_functions.php";
include_once "includes/html_header.php";

// ======================================
// CODE FOR THIS PAGE
echo "<div class='jumbotron'>";
echo "<div class='container'>";
echo "<h1>" . $heading . "</h1>";

// PRINT SQL FOR TROUBLE SHOOTING
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";

foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field
     check_submitted($key, $value, $missing_count);
     sanitize($key, $value, $_POST[$key]); // ESPECIALLY IMPORTANT NOW THAT WE ARE INSERTING INTO A DATABASE  
}

// exit if missing data in any but checkboxes
if($missing_count > 0) {
     echo "<br />Please <a href='guestbook_add.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
     exit;
}

// ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
$username=$_POST["username"];
$comment=$_POST["comment"];

// CONNECT TO DATABASE
include_once "includes/connection.php";

// SQL STATEMENT
$sql="INSERT INTO guestbook(username, comment)"
. " VALUES('$username', '$comment');"; 
    
// Display SQL for learning and trouble-shooting   
//echo "<br>3. SQL: " . $sql . "<br>";

// RUN QUERY     
$result=mysql_query($sql);

// TEST IF QUERY WORKED
if (!$result) {
     die("<h2 style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</h2>");
}
else {
	 echo "<h2 style='color:green;'>Query succeeded! Your data was added.</h2>";
	 
	      // link to view guestbook page
      echo "<p><a class='btn btn-success'href='guestbook_view.php'>View guestbook</a></p>";
}
echo "</div>";

?>

</div>
</div>


<?php
// =====================================================
// FOOTER 
include_once "includes/footer.php";

?>