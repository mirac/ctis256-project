<?=require_once "include/header.php";?>
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

            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin input[type="fullname"] {
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

    session_start();

    require_once('include/db.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["email"], $_POST["pass"])) {
            if (trim($_POST["email"]) != "" && trim($_POST["pass"]) != "") {
                $email = $_POST['email'];
                $pass = $_POST['pass'];

            }
        }
        $pass = hash('sha256', $pass);

        $sql = "INSERT INTO users (`fullname`, `email`, `pass` )= ? ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);


    }
    ?>
    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="fullname" class="sr-only">Full name</label>
    <input name="fullname" type="text" id="inputEmail" class="form-control" placeholder="Name Surname" required>
<br>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="remember-me" required> Accept the Aggreement
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
