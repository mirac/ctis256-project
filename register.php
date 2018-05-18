<? require_once "include/header.php";

if(isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>

<head>

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


</head>
<body class="text-center">
<form method="POST" action="sendreg.php" class="form-signin">
    <img class="mb-4" src="assets/logo.jpg" height="200">

    <h1 class="h3 mb-3 font-weight-normal">Register</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

    <label for="inputPassword" class="sr-only">Password</label>
    <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>

    <label for="fullname" class="sr-only">Full name</label>
    <input name="fullname" type="text" id="inputEmail" class="form-control" placeholder="Name Surname" required>

    <label for="cargo" class="sr-only">Cargo address</label>
    <input name="cargo" type="text" id="inputEmail" class="form-control" placeholder="Cargo Address" required>



    <br>
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" name="remember" value="remember-me" required> Accept the Aggreement
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
</form>
</body>
</html>
