<?php
$dsn = "mysql:host=localhost;dbname=assignments";
$username = "root";
try {
    $db = new PDO($dsn, $username);
} catch (PDOException $e) {
    $error = "Database Error: " . $e->getMessage();
    include "../view/error.php";
}