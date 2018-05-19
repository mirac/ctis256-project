<?php


require_once('include/db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        session_start();

        $product_id = $_POST['id'];
        $user_email = $_SESSION['user'];
        $comment = $_POST['comment'];

        // echo $category . '<br>' .  $brand. '<br>' . $title. '<br>' . $description. '<br>' .$image. '<br>' .$price. '<br>' .$promotional;

        $sql = "INSERT INTO comments (`customer_email`, `product_id`, `comment` )  values(?, ?, ?) ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$user_email, $product_id, $comment]);

    }
}

header('Location: product.php?id='. $product_id );
