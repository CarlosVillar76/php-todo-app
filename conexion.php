<?php

// http://php.net/manual/en/pdo.connections.php

$user = "carlosvillar76";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=TODO_LIST', $user, $pass);
    foreach($dbh->query('SELECT * from tareas') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>