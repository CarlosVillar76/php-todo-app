<?php

require_once("conexion.php");

try {

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $db->prepare('SELECT * FROM listas');
	$stmt->execute();
	$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>