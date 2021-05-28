<?php
    include("config/config.php");
    session_start();

    if($stmt = $mysqli->prepare("SELECT contador_promo FROM client WHERE id_client=?")) {
        $mysqli->set_charset('utf8mb4');
        $stmt->bind_param("i", $_SESSION['id_client']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($contador_promo);
        $stmt->fetch(); 
        $contador_promo++;
    } 
    $stmt = $mysqli->prepare("UPDATE client SET contador_promo = $contador_promo WHERE id_client=?");
    $mysqli->set_charset('utf8mb4');
    $stmt->bind_param("i", $_SESSION['id_client']);
	$stmt->execute();
	$stmt->close();
?>
<meta http-equiv="refresh" content="0; url=index.php"/>
