<!-- FOOTER -->
<footer>
<div class="container">


<?php

if(isset($connection)) {
mysql_close($connection);
echo "<p>Database connection closed!</p>";
}
else {
echo "<br />No database connection to close.";
}

?>
<p><small>Scott Campbell | &copy; 2014</small></p>
</div>
</footer>
</body>
</html>

