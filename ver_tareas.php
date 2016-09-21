<?php

require_once("conexion.php");

try {
	
	$idLista = filter_input(INPUT_GET, 'ID_listas', FILTER_VALIDATE_INT);

	$stmt = $dbh->prepare("SELECT * FROM tareas WHERE ID_listas = $idLista");
	$stmt->execute();
	$result = $stmt->fetchAll();
	
	header('Content-Type: application/json');
	echo json_encode($result);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>