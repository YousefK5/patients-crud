<?php

$serverName = 'localhost';
$userName = 'root';
$password = 'root';
$dbName = 'hospital';
try {
    $conn = new mysqli($serverName, $userName, $password, $dbName);
} catch (Exception $e) {
    echo 'Failed Connection';
    $e->getMessage();
}
?>
