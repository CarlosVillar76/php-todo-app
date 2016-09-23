<?php

require_once("conexion.php");

try {
	
	$idLista = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);
	$nombre = $_POST['nombre'];

	$stmt = $dbh->prepare("UPDATE listas SET nombre= :nombre WHERE ID= :ID");
	$stmt->bindParam(':ID', $idLista);
	$stmt->bindParam(':nombre', $nombre);
	
	$stmt->execute();
	
	$errmsg = [
        "msg" => "Lista actualizada correctamente"
        ];
    header('Content-Type: application/json');
    echo json_encode($errmsg);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>