<?php
require_once "include/header.php";
require_once "include/categories.php";
?>
<br>
<div id="container">

<!-- promotional Products -->
<?php
$item = $_GET["id"] ;
  try {

             $stmt = $db->prepare("select * from products where id = ?");
             $stmt->execute([$item]);
             $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
             foreach($list as $row) {
               $itemcnt = 0;

               echo  "<h1>" . $row['title'] . "</h1><br>" ;

                 echo '<div id="leftpart"><div id="desc">' . $row['description'] . "</div>";
               echo "<br><h1 style ='float: left; margin-left: 25%; margin-top: 30px;'>₺ " . $row['price'];
               echo '<br><button class="btn btn-primary btn-lg" type="submit"  onclick="javascript:addBasket('.$row['id'].');">Add to Cart <i class="fas fa-cart-arrow-down"></i></button></h1>';
               echo '</div>';
               echo '<div id="rightpart"><img src="';
               echo $row['image'];
               echo '"><br>';
               echo '</div>';

  }
  } catch(Exception $ex) {
      echo "<p>DB Error : " . $ex->getMessage() . " </p>";
  }
?>

</div>

<?php require_once "include/footer.php" ?>