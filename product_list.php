<?php
require_once "include/header.php";
require_once "include/categories.php";
?>

<div id="left">

    <?php

    try {
        $stmt = $db->prepare("select * from products where category = ?");
        $stmt->execute([$category]);
        echo $category;
        $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($list as $row) {
            $itemcnt = 0;
            echo '<div id="products">';
            echo "<a href='product.php?id={$row['id']}'>" . $row['title'] . "</a><br>";
            echo "<img src=" . "{$row['image']}" . "><br>";
            echo "<div id='price'>";
            echo "₺ " . "{$row['price']}";

            if ($row['promotional'] == 1) {
                echo ' <span class="badge badge-secondary">Discounted</span>';
            }
            echo '</div><br>';
            echo '<button class="btn btn-primary" type="submit">Add to Cart <i class="fas fa-cart-arrow-down"></i></button>';
            echo '<br></div>';
            $itemcnt += 1;
        }
    } catch (Exception $ex) {
        echo "<p>DB Error : " . $ex->getMessage() . " </p>";
        echo $itemcnt;
    }

    ?>
</div>
</div>

<?php require_once "include/footer.php" ?>