<?php
require_once "include/header.php";


if(empty($_SESSION) || $_SESSION['role'] == 0)
{

    header("Location: 404.php");
    exit;
}

else {

    echo '<p class="h1">Welcome ' . $_SESSION['fullname'] . "</p>";


}
/*
if(empty($_SESSION['user']['role']))
{
    header("Location: index.php");
    exit;
}

/*/
?>