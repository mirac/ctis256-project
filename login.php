<?php
require_once "include/header.php";

if (!empty($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <style>


            html,
            body {
                height: 100%;
            }

            body {
                align-items: center;

                padding-bottom: 40px;
                background-color: #f5f5f5;
            }

            .form-signin {
                width: 100%;
                max-width: 330px;
                padding: 15px;
                margin: auto;
            }

            .form-signin .checkbox {
                font-weight: 400;
            }

            .form-signin .form-control {
                position: relative;
                box-sizing: border-box;
                height: auto;
                padding: 10px;
                font-size: 16px;
            }

            .form-signin .form-control:focus {
                z-index: 2;
            }

            .form-signin input[type="email"] {
                margin-bottom: -1px;
                border-bottom-right-radius: 0;
                border-bottom-left-radius: 0;
            }

            .form-signin input[type="password"] {
                margin-bottom: 10px;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }


        </style>
        <title>Signin</title>

        <!-- Bootstrap core CSS -->
        <link href="assets/bootstrap.min.css" rel="stylesheet">

    </head>
<body class="text-center">
<form method="POST" action="login.php" class="form-signin">
    <img class="mb-4" src="assets/logo.jpg" height="200">
    <?php

    require_once('include/db.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"], $_POST["pass"])) {
            if (trim($_POST["email"]) != "" && trim($_POST["pass"]) != "") {
                $email = $_POST['email'];
                $pass = $_POST['pass'];
            }
        }

        $pass = hash('sha256', $pass);


        $sql = "SELECT * FROM users WHERE email = ? ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($pass == $user['pass']) {

                if (isset($remember)) {
                    $autologin = password_hash(uniqid(), sha256);
                    $setcookie("autologin", $autologin, time(), +60 * 60 * 24);
                    $stmt2 = $db->prepare("update users set autologin = ? where username = ?");
                    $stmt2->execute([$autologin, $user["email"]]);
                }
                echo "<h1>$email | " . $user['full_name'] . "</h1>";
                $_SESSION["user"] = $email;
                $_SESSION["fullname"] = $user['full_name'];
                $_SESSION["role"] = $user['role'];

                header("Location: index.php");
                exit;


            } else {

            }

            echo '<div class="alert alert-danger" role="alert">Your email or password is incorrect.</div>';

        } else {

            echo '<div class="alert alert-danger" role="alert">Your email or password is incorrect.</div>';

        }
    } else echo "Please send it with POST method";
    ?>
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required
           autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>

<?php require_once "include/footer.php" ?>