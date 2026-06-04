<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';

function getDatabaseConnection(): PDO {
    try {
        $host = "localhost";
        $dbname = "vikings";
        $user = "root";
        $pass = "root";
        $charset = "utf8mb4";
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        return new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        returnError(500, 'Could not connect to the database. ' . $e->getMessage());
    }
}