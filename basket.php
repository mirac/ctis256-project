
<html>
<?php

require_once 'include/header.php';
require_once 'include/db.php';
$stmt = $db->prepare("select * from products where promotional = 1 ");
$stmt -> execute();
$list = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<body>

    <div id="basketmain">

        <div id="basketleft">
            <h1>Basket</h1>

            <div id="basketleftinner">


                    <?php
                    foreach ($list as $item) {

                       echo ' <table><tr>';
                        echo '<td><img id="basketimg" src="' . $item['image'] . '"></td>';

                        echo '<td ><span id="baskettitle">'. $item['title'] . '</span> </td>';
                        //echo '<td><img src="' . $amount . '"></td>>'; This is amount part
                        //echo '<td><img src="' . $item['price'] * amount . '"></td>>';  price * amount
                        echo '<td ><span id="baskettitle">amount</span></td>';
                        echo '<td ><span id="baskettitle">' . $item['price']  . '</span></td>';

                        echo '</tr></table><br>';


                    }
                    ?>


            </div>

        </div>
        <div id="basketright">

            <h1>Checkout</h1>
            <div id="payout">

                Total price:


                Payment Method:



                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option1" autocomplete="off"><i class="fab fa-cc-paypal fa-4x"></i>



                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option2" autocomplete="off"> <i class="fab fa-cc-mastercard fa-4x"></i>
                    </label>
                    <label class="btn btn-primary">
                        <input type="radio" name="options" id="option3" autocomplete="off">  <i class="fab fa-cc-visa fa-4x" aria-hidden="true"></i>
                    </label>

                </div>






</body>


</html>
