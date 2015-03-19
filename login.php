<?php

include_once "includes/html_top.php";
session_start();
include_once "includes/php_header.php";
$programmer_name = "Scott Campbell";
$heading = "Login";
include_once "includes/html_header.php";

?>

<!-- ====================================== -->
<!-- CONTENT -->
<div class="jumbotron">
<div class="container">
<h1><?php echo $heading; ?></h1>

<?php

//5 lines below are used for testing your page without the form. 
//$_SESSION["loggedin"] = true;
//$_SESSION["username"] = "student";
//$_SESSION["permissions"] = "admin";
//echo "Session variables set!";
//exit;

if(isset($_GET["logout"]) && $_GET["logout"]==1){
	echo "<em>Successfully logged out.</em>";
}

?>
<div class="container"><div class="row"><div class="col-md-6">
<form method="post" action="login2.php" id="form1">
<div class="form-group">
	<label>Username: </label>
	<input class="form-control" type="text" name="username">
</div>
<div class="form-group">
<label>Password: </label>
<input class="form-control" type="password" name="password">
</div>
<input class"btn btn-primary" type="submit" value="Log in"><br />
</form>
</div></div></div>

<!-- This JavaScript puts the cursor in the first element on the form -->
<script>document.getElementById('form1').elements[0].focus();</script>

</div>
</div>

<?php include_once "includes/footer.php"; ?>