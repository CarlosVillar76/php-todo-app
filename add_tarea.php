<?php

require_once("conexion.php");

try {
	
	$name = $_POST['nombre'];
	$desc = $_POST['descripcion'];
	$idList = filter_input(INPUT_POST, 'ID_listas', FILTER_VALIDATE_INT);

	$stmt = $dbh->prepare("INSERT INTO tareas (nombre, descripcion, ID_listas) VALUES (:nombre, :descripcion, :ID_listas);");
	
	$stmt->bindParam(':nombre', $name);
	$stmt->bindParam(':descripcion', $desc);
	$stmt->bindParam(':ID_listas', $idList);
	
	$stmt->execute();
	
	$errmsg = [
        "msg" => "Tarea insertada correctamente"
        ];
    header('Content-Type: application/json');
    echo json_encode($errmsg);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>