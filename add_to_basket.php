<?php
session_start();
require_once 'include/db.php';


// AJAX REQUEST PARTIAL
if(!empty($_GET["addToBasketAjax"])) {

    if($_GET["addToBasketAjax"] == "true") {
        $product_id = htmlspecialchars($_GET["product_id"]);

        $stmt = $db->prepare("select * from products where id = ? ");
        $stmt -> execute([$product_id]);
        $product = $stmt->fetch((PDO::FETCH_ASSOC));

        // IF WE HAVE THIS PRODUCT, IT WILL BE ADDED TO BASKET
        $counter = count($_SESSION["basket"]["products"]);
        if($stmt->rowCount() > 0)
        {
            $already_in_basket = false;
            for ($x=0; $x < $counter; $x++) {
                if($product["id"] == $_SESSION["basket"]["products"][$x]["id"])
                    $already_in_basket = true;
            }

            if(!$already_in_basket)
            {
                $last_index = $counter++;

                $_SESSION["basket"]["products"][$last_index] = $product;
                $_SESSION["basket"]["products"][$last_index]["amount"] = !isset($_GET['amount']) ? 1 : $_GET['amount'];
            } else {
                for ($x=0; $x < $counter; $x++) {
                    if($_SESSION["basket"]["products"][$x]["id"] == $product["id"])
                        $_SESSION["basket"]["products"][$x]["amount"] += !isset($_GET['amount']) ? 1 : $_GET['amount'];
                }
            }
        }

        echo json_encode("The product has been successfully added to the basket!");
        exit;
    }

}else {
    header("Location: 404.php");
    exit;
}

// How many product we have in basket
$counter = count($_SESSION["basket"]["products"]);

// Total price of all products we have in basket
$sum = 0;
for ($i=0; $i < $counter; $i++) {
    $product = $_SESSION["basket"]["products"][$i];

    if($product["amount"] == 1)
        $sum += $product["price"];
    else
        $sum += ($product["price"] * $product["amount"]);
}


?>