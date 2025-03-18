<?php
require_once __DIR__ . '/../config/config.php';

function getPDOConnection() {
    $host = DB_HOST;
	$user = DB_USER;
	$pass = DB_PASS;
	$dbname = DB_NAME;
    $port = DB_PORT;
	

    try {
        $dsn = "mysql:host=" . $host .";port=" .$port. ";dbname=". $dbname;
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}