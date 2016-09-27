<?php

require_once("conexion.php");

try {
	
	$idTarea = filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT);
	$name = $_POST['nombre'];
	$desc = $_POST['descripcion'];
	$done = filter_input(INPUT_POST, 'hecho', FILTER_VALIDATE_INT);
	
    if (filter_var($done , FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>1))) === false) {
    	echo("Variable value is not within the legal range");
	} else {
    	echo("Variable value is within the legal range");
	}
	
	$stmt = $dbh->prepare("UPDATE tareas SET nombre = :nombre, descripcion = :descripcion, hecho = :hecho WHERE ID = :ID");
	
	$stmt->bindParam(':ID', $idTarea);
	$stmt->bindParam(':nombre', $name);
	$stmt->bindParam(':descripcion', $desc);
	$stmt->bindParam(':hecho', $done);
	
	$stmt->execute();
	
	$errmsg = [
        "msg" => "Tarea actualizada correctamente"
        ];
    header('Content-Type: application/json');
    echo json_encode($errmsg);
	
} catch (PDOException $e) {
	echo $e->getMessage();
}

?>