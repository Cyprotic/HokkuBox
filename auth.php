<?php
	session_start();
	include("config/config.php");
	
	if($stmt = $mysqli->prepare("SELECT id_client, user, password FROM client WHERE user=? AND password=?")) {
        $mysqli->set_charset('utf8mb4');
		$stmt->bind_param("ss", $_POST['user'], $_POST['password']);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($id_client, $user, $password);
		$num_rows = $stmt->num_rows;
		$stmt->fetch();
		if($num_rows>0) {
            $_SESSION['user']=$_POST['user'];
            $_SESSION['id_client']=$id_client;
            header("Location: index.php");
            
		} else {
            echo $_POST['user'];
            echo $_POST['password'];
		}
        $stmt->close();
	}
?>