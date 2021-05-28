<?php
	include("config/config.php");
    $stmt = $mysqli->prepare("INSERT INTO client (user, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $_POST['user'], $_POST['password'], $_POST['first_name'], $_POST['last_name'], $_POST['email']);
	$stmt->execute();
	$stmt->close();
?>
<meta http-equiv="refresh" content="0; url=index.php"/>