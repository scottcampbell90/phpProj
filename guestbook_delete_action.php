<?php

include_once "includes/html_top.php";
session_start();
include_once("login_check.php");
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "Guest Book Delete Action Page";

// ==========================================================
// ARRAY FOR SELECT
$form_fields=array();
$form_fields["id"]="select";

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
// print_r($_POST);
// echo "<br><br>";

// CHECK EACH FIELD FOR MISSING DATA AND SANITIZE
if(!isset($_POST["confirm_delete"])) {  // Run only if coming from the current page
    foreach ($form_fields as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field
         check_submitted($key, $value, $missing_count);
         sanitize($key, $value, $_POST[$key]); // IMPORTANT
    }
	
    // exit if missing data in any but checkboxes
	
    if($missing_count > 0) {
         echo "<br />Please <a href='guestbook_delete.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
         exit;
    }
	
    // ASSIGN DATA TO VARIABLES FOR EASIER HANDLING
    $id = $_POST['id'];
	
    // CONNECT TO DATABASE
    include_once "includes/connection.php";

    // SQL STATEMENT: Find record that is about to be deleted
    $sql="SELECT *"
    . " FROM guestbook"
    . " WHERE guestbook.ID=$id;";
		
    // Display SQL for learning and trouble-shooting
    //echo "<br>3. SQL: " . $sql . "<br>";
	
    // RUN QUERY
    $result=mysql_query($sql); 
	
	// TEST IF QUERY WORKED
	if (!$result) {
		die("<p style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</p>");
	}
	else {
		 echo "<p style='color:green;'>Query succeeded!</p>";

	}
	echo "<a class='btn btn-success' href='guestbook_delete.php'>Return to Delete Form</a>";
	echo "</div>";
	echo "</div>";
	
    // GET DATA FOR RECORD THEY SELECTED
    // Assign array elements to variables for easier handling
    while ($row=mysql_fetch_array($result)) { 
	
	     $id = $row["id"];
	     $username = $row["username"];
	     $comment = $row["comment"];
    } 
	 // =====================================================================
     // WARN THE USER 
     
     // Temporary code to prevent errors while coding this page (comment this out // when your page works):
     // $x = "---";

   //  echo "ID: " .  $x  . "<br />";
   //  echo "Username: " .  $x  . "<br />";
   //  echo "Comment: " .  $x  . "<br />";
     ?>
     <div class="container">
     <div class="row">
     <div class="col-md-6">
     <h2 style='color:red;'>You are about to delete:</h2>
   	 <table class='table table-striped table-hover'>
	 <tr>
	 <th>ID </th>
	 <th>User </th>
	 <th>Comment </th>
	 </tr>
     <tr>
     	<td><?php echo $id ?></td> 
     	<td><?php echo $username ?></td>
     	<td><?php echo $comment ?></td>
     </tr>

     </table>
     </div>



	<?php
	 echo "<div class='col-md-6'>";
     echo "<form method='post' action='guestbook_delete_action.php'>"; // Submitting to this same page again
     
     echo "<h2>Are you SURE (Y/N)?</h2> ";
          // Display select box with 2 options


	     echo "<table class='table table-striped table-hover'>";
	     echo "<tr>" . "<td>";
	     echo "<select name='confirm_delete'>";
	     echo "<option value='N'>N</option>";
	     echo "<option value='Y'>Y</option>";
	     echo "</select>";
	     echo "</td>" . "<td>";
	     echo "<input type='hidden' name='id' value='$id'>"; // Send id back to page when we submit it
	     echo "<input class='btn btn-warning' type='submit' value='Submit'>";
	     echo "</td>";

     echo "</div>";
     echo "</div>";
     echo "</div>";
     echo "</div>";
     
     exit;
	
	} // END IF
	


// AT THIS POINT, YOUR CODE SHOULD RUN UP TO THE POINT OF ANSWERING "Y" OR "N". Answer that question with "Y" and submit the page. It should
// submit back to the same page, and you should see this displayed:
//     Array ( [confirm_delete] => Y [id] => 6 )
// If you don't see that information, go back and fix the code above before you continue.

// PROCESS DELETE IF "Y" CHOSEN (only runs after this page has been submitted back to itself)

if ($_POST["confirm_delete"] == "Y") {
	
	// CONNECT TO DATABASE (Steps 1 and 2)
	
	include_once "includes/connection.php";
	
	// ASSIGN SUBMITTED ID TO A VARIABLE FOR EASIER HANDLING
	
	$id = $_POST["id"];
	
	// SQL STATEMENT
	
     $sql="DELETE"
     . " FROM guestbook"
     . " WHERE guestbook.id=$id"
     . " LIMIT 1;"; 
     
     		
	// Display SQL for learning and trouble-shooting	
	//echo "<br>3. SQL: " . $sql . "<br>";
	
		// RUN QUERY
	
	$result=mysql_query($sql); 
	
	// TEST IF QUERY WORKED
	if (!$result) {
		die("<p style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</p>");
	}
	else {
		 echo "<p style='color:green;'>Query succeeded! The record was deleted.</p>";
		 
			 // link to view guestbook page
		 echo "<p><a class='btn btn-success' href='guestbook_view.php'>View guestbook</a></p>";
	}
	
} // END IF BLOCK $_POST["confirm_delete"]...
	
     
else { // If they got this far, they submitted this page and chose "N" -- they do *not* want to delete.

	echo "<p style='color:red;'>Action canceled.</p>";
	
	echo "<p><a href='guestbook_delete.php'>Return to Delete Form</a></p>";

}
?>
</div>
</div>

<?php
// ===================================================== 
// FOOTER -->

include_once "includes/footer.php";

?>