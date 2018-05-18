<?php
require_once 'include/db.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Coming soon..</title>
    <script src="assets/jquery-1.12.4.min.js"></script>
    <script src="assets/jquery.toast.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome-all.css">
    <link rel="stylesheet" href="assets/jquery.toast.min.css">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">All Of Them Are Here</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="categories.php">Categories</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>-->
        </ul>

        <?php
        if(empty($_SESSION['user'])) {
            ?>
            <a class="link" href="login.php">Login</a>&nbsp;
            <span style="color:#999">|</span>
            &nbsp;<a class="link" href="register.php">Register</a>&nbsp;&nbsp;&nbsp;
            <?php
        } else {
            ?>
            <span style="color:#fff">Welcome <?=$_SESSION['fullname']?>!</span>&nbsp;
            <span style="font-size: 12px"><a class="link" href="logout.php">(Logout)</a></span>
            &nbsp;
            <?php
        }
        ?>
        <i class="fa  fa-shopping-cart" style="color:white; font-size: 25px;margin-right: 0;padding-right: 0"></i>
        <a class="link" style="margin-left: 5px;margin-right: 5px" href="basket.php">Basket (<?=count($_SESSION["basket"]["products"])      ?>)</a>&nbsp;
        <form class="form-inline my-2 my-lg-0" action="search.php" method="get">

            <input class="form-control mr-sm-2" name="term" value="<?php if(isset($_GET['term'])) echo $_GET['term']; ?>" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>


