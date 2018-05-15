<!DOCTYPE html>
<html>
    <head>
<<<<<<< HEAD
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
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Categories.php">Categories</a>
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
=======
    <meta charset="utf-8">
    <title>Coming soon..</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">


<body>
  <?php
  $name = "Mirac";
  echo "<h1>$name</h1>";

  for ($i=0; $i < 10; $i++) {
    echo $i."<br>";
  }
   ?>
>>>>>>> e56d4b587182c0d2cc36ca04644d43c105902d4d

    <?php
    require_once 'include/db.php';

<<<<<<< HEAD





<!-- promotional Products -->
<?php

  try {
     $list = $db->query("select * from products where promotional=1")->fetchAll(PDO::FETCH_ASSOC) ;
     foreach($list as $row) {
         echo '<div id="probox">';
         echo '<div class="alert alert-success" role="alert">
              Promotion</div>';

         echo "{$row['title']}" ;

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

=======
	echo '<h2 class="w3-center">Manual Slideshow</h2>';
 		$sql = "select * from product where is_promotional = 1";
        $stmt = $db -> query($sql);
        echo'<div class="w3-content w3-display-container">';

             if($stmt->rowCount()>0)
            {

              foreach ($stmt as $item)
              {


	  echo'<a href="#"><img class="mySlides" src="'. $item['prod_image'][1] . '" style="width:100%"></a>';
	  echo'<a href="#"><img class="mySlides" src="'. $item['prod_image'] . '" style="width:100%"></a>';
	  echo'<a href="#"><img class="mySlides" src="https://www.w3schools.com/W3CSS/img_mountains.jpg" style="width:100%"></a>';
	  echo'<a href="#"><img class="mySlides" src="https://www.w3schools.com/W3CSS/img_forest.jpg" style="width:100%"></a>';
}}
	  echo'<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>';
	  echo'<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>';
	echo'</div>';
 ?>
<script type="text/javascript" src="slide.js"></script>

>>>>>>> e56d4b587182c0d2cc36ca04644d43c105902d4d
</body>
</html>
