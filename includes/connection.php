<!-- Connection.php -->

<?php

include_once "php_header.php";
include_once "html_top.php";
include_once "html_header.php";

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "cas225");



// Create a database connection
$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);

/* Display a message that the database connection failed or succeeded
if(!isset($connection)) {
	 die("1. Database connection failed: " . mysql_error());
	 }
else {
	 echo "1. Database connection succeeded!";
}*/
// Select a database to use
$db_select = mysql_select_db(DB_NAME, $connection); 

/* Display a message that the database selection failed or succeeded
if(!isset($db_select)) {
	 die(" 2. Database selection failed: " . mysql_error());
   }
else {
	 echo " 2. Database selection succeeded!";

}*/

?>