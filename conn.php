<?php
$config = require_once 'config.php';

try {
	$conn = new PDO("mysql:host=localhost; dbname=${config['DB_NAME']}", $config['DB_USER'], $config['DB_PASS']);
	$GLOBALS['conn'] = $conn;
}
catch(PDOException $e) {
	echo $e->getMessage();
}