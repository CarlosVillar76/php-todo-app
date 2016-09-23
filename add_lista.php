<?php

require_once("conexion.php");

try {
	
	//$idLista = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);
	$nombre = $_POST['nombre'];

	//$stmt = $dbh->prepare("INSERT INTO listas (ID, nombre) VALUES (:ID, :nombre)");
	$stmt = $dbh->prepare("INSERT INTO listas (nombre) VALUES (:nombre)");
	//$stmt->bindParam(':ID', $idLista);
	$stmt->bindParam(':nombre', $nombre);
	
	$stmt->execute();
	
	$errmsg = [
        "msg" => "Lista insertada correctamente"
        ];
    header('Content-Type: application/json');
    echo json_encode($errmsg);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>