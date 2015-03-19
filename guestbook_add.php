<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Ron Bekey";
$heading = "Add Entry to Guest Book";
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
$sql="SELECT username"
. " FROM users"
. " ORDER BY users.username;";
     
// Display SQL for trouble-shooting
//echo "<br>3. SQL: " . $sql . "<br>";

// RUN QUERY
$result=mysql_query($sql); 

// TEST IF QUERY WORKED
if (!$result) {
     die("<p style='color:red;'>ERROR: Query failed: " . mysql_error() . "</p>");
}
else {
	 echo "<p style='color:green;'>4. Query succeeded! " . mysql_num_rows($result) . " rows returned.";
}

?>
</div>
</div>

<!-- ========================================================== -->
<!-- FORM TO ADD RECORD -->
<div class="container">
<div class="row">
<div class="col-md-6">
<form id="form1" name="form1" method="post" action="guestbook_add_action.php">
<div class="form-group">
<table class="table table-striped table-hover">
<tr>
<td><label>Username: </label></td>

<?php

// CALL FUNCTION TO CREATE DYNAMIC SELECT BOX
$field_name = "username";
$table_name = "users";
$list = select_box($field_name, $table_name, $result);

// Once you complete Step 10, your page should run with no errors, and you should be able to select a name in the list box.

echo "<td>" . $list . "</td>";

?>

</tr>
<tr>
<td><label>Comment:</label></td>
<td><textarea class="form-control "name="comment" rows="3" id="comment"></textarea></td>
</tr>

<tr>
<td>&nbsp;</td><td><button class ="btn btn-info" style="width:50%" type="submit" name="Submit">Submit</button></td>
</tr>

</table>
</form>
</div>
</div>
</div>
</div>
<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

<!-- ===================================================== -->
<!-- FOOTER -->

<?php

include_once "includes/footer.php";

?>