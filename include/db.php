<?php

$dsn = 'mysql:host=ctis256project.ctamhwtuall6.us-west-2.rds.amazonaws.com;dbname=test;charset=utf8mb4';
$user = 'root';
$pass = 'Password123';

try {
  $db = new PDO ($dsn, $user, $pass);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch ( Exception $ex) {
    echo "<p>DB Connection Error</p>";
    exit;
}