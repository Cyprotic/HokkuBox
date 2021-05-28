<?php	
	//Connecting to database
	$mysqli = new mysqli("localhost", "root", "", "hokkubox");
	
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
?>