<?php
require_once 'include/db.php';
require_once 'include/header.php';


// How many product we have in basket
$counter = count($_SESSION["basket"]["products"]);

// Total price of all products we have in basket
$sum = 0;
for ($i = 0; $i < $counter; $i++) {
    $product = $_SESSION["basket"]["products"][$i];

    if ($product["amount"] == 1)
        $sum += $product["price"];
    else
        $sum += ($product["price"] * $product["amount"]);
}
?>

<body>

<div id="basketmain">

    <div id="basketleft">
        <h1>Basket <span style="font-size: 12px"><a href="javascript:cleanBasket();">(Clean Basket)</a></span></h1>

        <div id="basketleftinner">

            <?php
            if($counter > 0) {
                echo ' <table border="1">';
                echo '<th></th><th><center>Product</center></th><th><center>Amount</center></th>';
                echo '<th><center>Unit Price</center></th><th><center>Total Price</center></th><th></th>';
            } else {
                echo "<h2>You do not have any products in the basket.</h2>";
            }


            foreach ($_SESSION["basket"]["products"] as $item) {
                $total_amount_price = ($item["price"] * $item["amount"]);
                echo '<tr>';
                echo '<td><img id="basketimg" src="' . $item['image'] . '"></td>';

                echo '<td width="300"><span id="baskettitle">' . $item['title'] . '</span> </td>';
                //echo '<td><img src="' . $amount . '"></td>>'; This is amount part
                //echo '<td><img src="' . $item['price'] * amount . '"></td>>';  price * amount
                echo '<td ><center><span id="baskettitle">' . $item['amount'] . '</span></center></td>';
                echo '<td ><center><span id="baskettitle">' . $item['price'] . ' TL</span></center></td>';
                echo '<td ><center><span id="baskettitle">' . $total_amount_price . ' TL</span></center></td>';
                echo '<td><center><a href="javascript:deleteProductFromBasket('.$item['id'].');"><i class="far fa-trash-alt"></i></a></center></td>';
                echo '</tr>';

            }

            echo '</table><br>';
            ?>


        </div>

    </div>
    <div id="basketright">

        <h1>Checkout</h1>
        <div id="payout">
            <center><br>
                <?php echo "<h2>TOTAL PRICE:<br>$sum TL</h2>"; ?>
                <br>
                <h3>Items: <?= $counter ?></h3>
                <br></center>


            <h3 style="text-align: center; margin: 10px auto; border-bottom: 1px solid black; width: 78%  ">Payment
                Method</h3>

            <div id="paymethod">

                <div class="paymethod btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <i id="payment" class=" fab fa-cc-paypal fa-4x"></i><br>
                        <input type="radio" name="options" id="option1" autocomplete="off">
                    </label>
                    <label class="btn btn-primary">
                        <i id="payment" class="fab fa-cc-mastercard fa-4x"></i><br>
                        <input type="radio" name="options" id="option2" autocomplete="off">
                    </label>
                    <label class="btn btn-primary">
                        <i id="payment" class="fab fa-cc-visa fa-4x"></i><br>
                        <input type="radio" name="options" id="option3" autocomplete="off">
                    </label>
                </div>


            </div>
            <button type="button" onclick="javascript:paymentOperation();" class="btn btn-primary" style="margin-left: 15%;  width: 69%;" <?php if(count($_SESSION['basket']['products']) ==     0) echo "disabled"; ?>>Pay</button>

            <?php require_once "include/footer.php" ?>
