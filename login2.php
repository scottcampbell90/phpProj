<?php

session_start();
$missing_count = 0;
$username=$_POST["username"];
$password=$_POST["password"];
$hashed_password=sha1($password);
include_once "includes/cas225_functions.php";

foreach ($_POST as $key => $value) { // Loop through form fields. Key is the name of the field, value is type of field
     check_submitted($key, $value, $missing_count);
     sanitize($key, $value, $_POST[$key]); // IMPORTANT
}
if($missing_count > 0) {
     echo "<br />Please <a href='guestbook_add.php'>Go Back</a> and fill in the missing data.<br /><br /></div></body></html>";
     exit;
}

// CONNECT TO DATABASE
include_once "includes/connection.php";

// SQL STATEMENT
$sql="SELECT username, permissions"
. " FROM users"
. " WHERE username = '$username'"
. " AND password = '$hashed_password'"
. " LIMIT 1;";
     
//Display SQL for Troubleshooting
//echo "<br>3. SQL: " . $sql . "<br>";

// RUN QUERY
$result=mysql_query($sql); 

// TEST IF QUERY WORKED
/*if (!$result) {
     die("<p style='color:red;'>ERROR: Database query failed: " . mysql_error() . "</p>");
}
else {
   echo "<p style='color:green;'> Log In successful! " . mysql_num_rows($result). " rows returned.</p>";
}*/

// If one row was returned (only one match), the login was successful     
if(mysql_num_rows($result) == 1){
     //creates an associative array named $found_user from the $result object.
        $found_user = mysql_fetch_assoc($result);
	   //set 3 session variables for use on all pages.
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $found_user["username"];
        $_SESSION["permissions"] = $found_user["permissions"];
     //Forwarding code 
     header("Location: home.php");
 }
     //'else' block here that tells the user that they entered the wrong username or password.

else {
 echo "<p class='red' id='login'> Wrong username or password! Please <a href='login.php'> Go back</a> and try again.</p>";
}
echo "<div class='jumbotron'>";
echo "<div class='container'>";
echo "<h3>Logged in as: <strong>{$_SESSION[username]} [{$_SESSION[permissions]}]</strong></h3>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";


//==============
// FOOTER

include_once("includes/footer.php");

?>
