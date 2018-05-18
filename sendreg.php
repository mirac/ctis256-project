<?php



require_once('include/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        if (trim($_POST["email"]) != "" && trim($_POST["pass"]) != "") {
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $fullname = $_POST['fullname'];

        }
    }
    $pass = hash('sha256', $pass);


    echo $email, $pass, $fullname;

    $sql = "INSERT INTO users (`fullname`, `email`, `pass` )= `fullname`, `email`, `pass` ";
    $stmt = $db->prepare($sql);
    $stmt->execute([$email]);


}
?>