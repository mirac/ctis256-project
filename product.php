<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Coming soon..</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="assets/bootstrap.min.css">
      <script src="assets/bootstrap.min.js"></script>
      <script src="assets/jquery-3.3.1.slim.min.js"></script>
      <link rel="stylesheet" href="assets/fontawesome-all.css">
  </head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">All Of Them Are Here</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
        <i class="fa  fa-shopping-cart" style="color:white; font-size: 30px; margin-right: 10px;"></i>&nbsp
      <form class="form-inline my-2 my-lg-0">

        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

<!-- Category Start -->
  <div id="maincategory">
  <table class="table table-hover table-sm table-bordered">
    <thead class="thead-dark"><TR><th>Categories</th></tr></thEAD>
    <?php
      require_once 'db.php';
      try {
         $list = $db->query("select distinct category from products")->fetchAll(PDO::FETCH_ASSOC) ;
         foreach($list as $row) {
             echo "<tr>" ;
             echo "<td><a href=products.php?category={$row['category']}>{$row['category']}</a></td>" ;
             echo "</tr>" ;
      }
      } catch(Exception $ex) {
          echo "<p>DB Error : " . $ex->getMessage() . " </p>";
      }
?>
</table>
</div>

<!-- Category End -->
<!-- promotional Products -->
<?php
$item = $_GET["id"] ;
  try {




             $stmt = $db->prepare("select * from products where id = ?");
             $stmt->execute([$item]);
             $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
             foreach($list as $row) {
               $itemcnt = 0;

               echo  "<h1>" . $row['title'] . "</h1>" ;
               echo '<div id="leftpart"><div id="desc">' . $row['description'] . "</div>";
               echo "<h1 style: ='float: left;'>₺ " . "{$row['price']}";
               echo '<br><button class="btn btn-primary btn-lg" type="submit">Add to Cart <i class="fas fa-cart-arrow-down"></i></button></h1>';
               echo '"</div>";'
               echo '<div id="rightpart"><img src="' .   $row['image'] .  ' style="float: left; margin-right: 40px;"><br>';
               echo '"</div>";'

  }
  } catch(Exception $ex) {
      echo "<p>DB Error : " . $ex->getMessage() . " </p>";
  }
?>

</body>
</html>
