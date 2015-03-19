<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "View Guestbook";

// ==========================================================
//ARRAY OF FORM FIELD NAMES SO WE CAN LOOP THROUGH THEM
$form_fields=array();
$form_fields["username"]="text";
$form_fields["comment"]="text";

// ==========================================================
include_once "includes/cas225_functions.php";
include_once "includes/html_header.php";

// ======================================
// CODE FOR THIS PAGE

echo "<div class='jumbotron'>";
echo "<div class='container'>";
echo "<h1>" . $heading . "</h1>";

// CONNECT TO DATABASE
include_once "includes/connection.php";

// SQL STATEMENT
$sql="SELECT *"
. " FROM guestbook"
. " ORDER BY guestbook.id;";

// Display trouble-shooting
//echo "<br>3. SQL: " . $sql . "<br>";

// RUN QUERY
$result=mysql_query($sql); 

// TEST IF QUERY WORKED
if (!$result) {
     die("<p style='color:red;'>ERROR: Query failed: " . mysql_error() . "</p>");
}
else {
     echo "<p style='color:green;'>Query succeeded! " . mysql_num_rows($result) . " rows returned.";
}

echo "</div>";
echo "</div>";
echo "<div class='container'>";

// DISPLAY DATA IN TABLE
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<th>ID</th><th>Username</th><th>Comment</th><th>Date/Time</th>";
echo "</tr>";

// LOOP THROUGH DATA, CREATING ONE ROW FOR EACH RECORD
while($rows=mysql_fetch_array($result)){     
	 $mydate = $rows['datetime'];
	 $rows['datetime'] = date('m/d/y h:i a', strtotime($mydate));
     echo "<tr>";
     echo "<td>" . $rows['id'] . "</td>";
     echo "<td>" . $rows['username'] . "</td>";
     echo "<td>" . $rows['comment'] . "</td>";
     echo "<td>" . $rows['datetime'] . "</td>";
     echo "</tr>";
}

echo "</table>";

echo "</div>";
// ===================================================== 
// FOOTER

include_once "includes/footer.php";

// The include will produce this message on this page:
//     5. Database connection closed!

?>