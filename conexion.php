<?php

// http://php.net/manual/en/pdo.connections.php

$user = "carlosvillar76";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=TODO_LIST', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>