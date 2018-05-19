<?php
require_once "include/db.php";
session_start();

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


// AJAX REQUEST PARTIAL
if(!empty($_GET["addToBasketAjax"])) {
    if($_GET["addToBasketAjax"] == "true") {
        addToBasketAjax($db);
    }
}else if(!empty($_GET["countBasketProducts"])) {
    if($_GET["countBasketProducts"] == "true") {
        echo $counter;
    }
}else if(!empty($_GET["deleteBasketProduct"])) {
    deleteBasketProduct($db, $product, $counter);
}else if(!empty($_GET["paymentOperation"])) {
    if($_GET["paymentOperation"] == "true") {
        paymentOperation($db, $product, $counter);
    }
}else if(!empty($_GET["cleanBasket"])) {
    if($_GET["cleanBasket"] == "true") {
        cleanBasket($db, $counter);
    }
}else {
    header("Location: 404.php");
    exit;
}


function addToBasketAjax($db)
{
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

    echo "The product has been successfully added to the basket!";
    exit;
}

function deleteBasketProduct($db, $product, $counter)
{
    for ($x=0; $x < $counter; $x++) {
        if($product["id"] == $_SESSION["basket"]["products"][$x]["id"])
        {
            // REMOVE THIS PRODUCT FROM SESSION BASKET
            unset($_SESSION["basket"]["products"][$x]);
            echo "ok";
        }
    }
}


function paymentOperation($db, $counter)
{
    for ($i=0; $i < $counter; $i++) {

        $product = $_SESSION["basket"]["products"][$i];

        $sql = "INSERT INTO orders (customer_email,
                            product_id,
                            amount) VALUES (
                            :customer_email, 
                            :product_id, 
                            :amount)";

        $stmt = $db->prepare($sql);

        $stmt->bindParam(':customer_email', $_SESSION["user"]);
        $stmt->bindParam(':product_id', $product['id']);
        $stmt->bindParam(':amount', $product['amount']);

        $stmt->execute();

        $_SESSION['basket'] = [];
        $_SESSION['basket']['products'] = [];

    }

}

function cleanBasket($db, $counter) {
    $_SESSION['basket'] = [];
    $_SESSION['basket']['products'] = [];
}


?>