<?php
// HEADER
require_once "include/header.php";
require_once "include/categories.php";
?>


<!-- promotional Products -->
<?php

  try {
     $list = $db->query("select * from products where promotional=1")->fetchAll(PDO::FETCH_ASSOC) ;
     foreach($list as $row) {
         echo '<div id="probox">';
         echo '<div class="alert alert-success" role="alert">Promotion</div>';

        echo "<a href='product.php?id={$row['id']}'>" . $row['title'] . "</a>" ;


         echo "<img src=" . "{$row['image']}" . "><br>";
         echo "<div id='price'>";
         echo "₺ " . "{$row['price']}" . ' <span class="badge badge-secondary">Discounted</span></h6></div><br>' ;
         echo '<button class="btn btn-primary" type="submit">Add to Cart <i class="fas fa-cart-arrow-down"></i></button>';
         echo '<br></div>';


  }
  } catch(Exception $ex) {
      echo "<p>DB Error : " . $ex->getMessage() . " </p>";
  }
?>

<?php require_once "include/footer.php" ?>
