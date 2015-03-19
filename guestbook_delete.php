<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "Guestbook Delete Page";
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

// Display SQL for learning and trouble-shooting   
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
echo "</div>";//container
echo "</div>";//jumbotron
// ====================================== 
// FORM TO SELECT A RECORD TO DELETE

echo "<div class='container'>";
echo "<div class='row'>";
echo "<div class='col-md-6'>";
echo "<form id='form1' name='form1' method='post' action='guestbook_delete_action.php'>";
echo "<table class='table table-striped table-hover'>";
echo "<tr>";
echo "<td><label>Choose a record to delete:</label></td>";
echo "</tr>";
echo "<tr>";
echo "<td>";

// CALL FUNCTION TO CREATE DYNAMIC MULTI-SELECT BOX
$field_name1 = "id";
$field_name2 = "username";
$field_name3 = "comment";
$list = multi_select_box($field_name1, $field_name2, $field_name3, $result);

echo "$list";
echo "</td>";
echo "</tr>";
echo "<tr>";
echo "<td><input class='btn btn-info' type='submit' name='Submit' value='Submit' /></td>";
echo "</tr>";
echo "</table>";
echo "</form>";
echo "</div>";//col
echo "</div>";//row
echo "</div>";// container

// The JavaScript code below will highlight the first element in the form.
echo "<script>document.getElementById('form1').elements[0].focus();</script>"; 

// ===================================================== 
// FOOTER 

include_once "includes/footer.php";

?>