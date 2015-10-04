<?php

$dsn = "pgsql:host=localhost;dbname=FNAC;";
$user = "postgres";
$password = "password"; 
try {
	$db = new PDO($dsn,$user,$password);
} catch (PDOException $e) {
	echo 'Connexion échouée : ' . $e->getMessage();
}

// Pour éviter d'avoir à réutiliser "global" par la suite
function db() { global $db; return $db; }