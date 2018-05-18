
<html>
<?php


require_once 'include/header.php';
require_once 'include/db.php';

$stmt = $db->prepare("select * from products where promotional = 1 ");
$stmt -> execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);


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
    }

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

<body>

    <div id="basketmain">

        <div id="basketleft">
            <h1>Basket</h1>

            <div id="basketleftinner">


                    <?php
                    foreach ($_SESSION["basket"]["products"] as $item) {
                        $total_amount_price = ($item["price"] * $item["amount"]);

                       echo ' <table border="1"><tr>';
                        echo '<td><img id="basketimg" src="' . $item['image'] . '"></td>';

                        echo '<td width="300"><span id="baskettitle">'. $item['title'] . '</span> </td>';
                        //echo '<td><img src="' . $amount . '"></td>>'; This is amount part
                        //echo '<td><img src="' . $item['price'] * amount . '"></td>>';  price * amount
                        echo '<td ><center><span id="baskettitle">'. $item['amount'] .'</span></center></td>';
                        echo '<td ><center><span id="baskettitle">Unit Price:' . $item['price']  . '</span></center></td>';
                        echo '<td ><center><span id="baskettitle">Total Price(x'.$item['amount'].'):' . $total_amount_price . '</span></center></td>';
                        echo '</tr></table><br>';


                    }
                    ?>


            </div>

        </div>
        <div id="basketright">

            <h1>Checkout</h1>
            <div id="payout">
                <center><br>
                <?php echo "<h2>TOTAL PRICE:<br>$sum TL</h2>"; ?>
                <br>
                <h2>Items: <?=$counter?></h2>
                <br></center>


                <h3 style="text-align: center; margin: 10px auto; border-bottom: 1px solid black; width: 78%  ">Payment Method</h3>

            <div id="paymethod">

                <div class="paymethod btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <i id="payment" class=" fab fa-cc-paypal fa-4x"></i><br>
                        <input type="radio" name="options" id="option1" autocomplete="off" >
                    </label>
                    <label class="btn btn-primary">
                        <i id="payment" class="fab fa-cc-mastercard fa-4x"></i><br>
                        <input type="radio" name="options" id="option2" autocomplete="off" >
                    </label>
                    <label class="btn btn-primary">
                        <i id="payment" class="fab fa-cc-visa fa-4x"></i><br>
                        <input type="radio" name="options" id="option3" autocomplete="off" >
                    </label>
                  </div>


            </div>
                <button type="button" class="btn btn-primary" style="margin-left: 15%;  width: 69%;">Pay</button>








</body>


</html>
