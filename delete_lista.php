<?php

require_once("conexion.php");

try {
	
	$idLista = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);

	$stmt = $dbh->prepare("DELETE FROM listas WHERE ID= :ID");
	$stmt->bindParam(':ID', $idLista);
	
	$stmt->execute();
	
	$errmsg = [
        "msg" => "Lista borrada correctamente"
        ];
    header('Content-Type: application/json');
    echo json_encode($errmsg);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>