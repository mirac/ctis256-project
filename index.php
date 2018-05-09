<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Coming soon..</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<body>
    <?php
      require_once 'db.php';


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

</body>
</html>

<?php



 ?>
