<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <title>Coming soon..</title>
    <link rel="stylesheet" type="text/css" href="style.css">
     <link rel="stylesheet" type="text/css" href="https://www.w3schools.com/w3css/4/w3.css">
     

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
