<?php

require_once('include/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (trim($_POST["email"]) != "" && trim($_POST["pass"]) != "") {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $fullname = $_POST['fullname'];
            $cargo = $_POST['cargo'];


    $pass = hash('sha256', $pass);


    echo $email, $pass, $fullname;

    $sql = "INSERT INTO users (`full_name`, `email`, `pass`, `cargo_address` )  values(?, ?, ?, ?) ";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fullname, $email, $pass, $cargo]);

        }
        else{


            header("Location: register.php");
            exit;
            

        }

        header("Location: index.php");

    }
}



?>


