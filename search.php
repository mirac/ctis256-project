<?php
require_once "include/header.php";
require_once "include/categories.php"
?>

<br>
<div id="container">

    <h1>Search Page</h1>
    <center><h4>You are looking at results of '<?=$_GET['term']?>' term;</h4></center>
    <div id="left">

        <?php
        try {
            $rcnt = 0;
            $term = $_GET['term'];
            $trimmed = trim($term);
            if($trimmed != '')
            {
            $stmt = $db->prepare("select * from products where title LIKE :keywords;");
            $stmt->bindValue(':keywords', "%$term%");
            $stmt->execute();

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
                $rcnt = $stmt->rowCount();

            }
            }

            if($rcnt == 0)
                echo '<br><br><br><center><div class="alert alert-danger" style="margin-left:120px; width:500px">
  <strong>Sorry!</strong><br>We could not find any result related to this term.
</div></center><br><br><br>';
        } catch (Exception $ex) {
            echo "<p>DB Error : " . $ex->getMessage() . " </p>";
            echo $itemcnt;
        }

        ?>
    </div>
    <br>
    <?php if($rcnt > 0) {
        ?>
    <p style="text-align: center; clear: both;">There are  <?= $rcnt ?> items.</p>
    <?php
    }
    ?>
</div>



</div>


<?php
require_once "include/footer.php";
?>