<?php

require_once("conexion.php");

try {
	
	$stmt = $dbh->prepare("SELECT * FROM listas");
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	header('Content-Type: application/json');
	echo json_encode($result);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>