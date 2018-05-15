<?php

$dsn = 'mysql:host=localhost;dbname=test;charset=utf8mb4';
$user = 'root';
$pass = '321';

try {
  $db = new PDO ($dsn, $user, $pass);
  $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch ( Exception $ex){
<<<<<<< HEAD

=======
>>>>>>> a87d28a703953bfc963af28eaf0817a4772b1164
  echo "<p>DB Connection Error</p>";
  exit;
}
