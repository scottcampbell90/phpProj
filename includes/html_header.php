<title><?php echo $heading; ?></title>
<link rel = "stylesheet" href = "css/jumbotron.css"> 
<link rel = "stylesheet" href = "css/bootstrap.min.css"> 
</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="home.php"><?php echo $link_1_text ?></a>
	        </div>
	        <div id="navbar" class="collapse navbar-collapse">
          		<ul class="nav navbar-nav navbar-right">
<?php

// $_SERVER["SCRIPT_NAME"] is complete path. basename() pulls out file name from the path. strpos() returns the location where the word is found.
// This if statement runs the code only if the word "login" is not in the file name and the "loggedin" variable is set.
			$file_name = basename($_SERVER["SCRIPT_NAME"]); 
			if ((strpos($file_name, "login") == false) && isset($_SESSION["loggedin"])){
				// ====================================== 
				// NAVIGATION BAR
				
				echo "<li><a href= '{$link_2_page}'> {$link_2_text} </a></li>";
				echo "<li><a href= '{$link_3_page}'> {$link_3_text} </a></li>";
				if($_SESSION["permissions"]=="admin"){
				echo "<li><a href= '{$link_4_page}'> {$link_4_text} </a></li>"; 
				}
				
				echo "<li><a href= '{$link_5_page}'> {$link_5_text} </a></li>";
				echo "<li><a href= ''> <strong class='user'>{$_SESSION[username]}</strong></a></li>";

}

?>
</ul>
</div>
</div>
</nav>