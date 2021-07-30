<?php
	$conn = mysqli_connect("localhost", "root", "", "appChat");
	if (!$conn) {
	 	echo "Database connected " .mysqli_connect_error();
	 } 
?>