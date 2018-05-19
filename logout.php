<?php

session_start();

$_SESSION = [];
$_SESSION["basket"] = [];

  setcookie(session_name(), '', 1, '/');  // delete PHPSESSID Cookie
  session_destroy();  // delete session file

  header("Location: index.php") ;

exit();


?>