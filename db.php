<?php

$dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
$user = 'root';
$pass = '';

try {
  $db = new PDO ($dsn, $user, $pass);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch ( Expression $ex){

  echo "<p>DB Connection Error</p>";
  exit;
}
