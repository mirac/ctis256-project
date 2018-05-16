
<!--

<?php
include 'simple_html_dom.php';

$link = $_GET["id"];

$html = file_get_html("$link");
  $i=0;




$text = "INSERT INTO `products` (`id`, `category`, `brand`, `title`, `price`, `description`, `comments`, `raiting`, `image`, `promotional`)";
$text = $text . "values(NULL, '',";


foreach($html->find('span.brand-name > a') as $e){
if($i != 1) {
    $i+=1;
$text = $text .  "'" . $e->innertext . "',";}
}


foreach($html->find('h1#product-name') as $e)
   $text = $text .  "'" . $e->innertext . "',";


   foreach($html->find('del#originalPrice') as $e){
     $price = $e->innertext;
     $pricev = str_replace(".", "", $price);
     $pricen = str_replace(",", ".", $pricev);
     $pricetl = str_replace("TL", "", $pricen);
     $text = $text .  $pricetl . ", '', '', '', ";
   }



foreach($html->find('img.product-image') as $element){


    if($element->src==NULL){

    }
    elseif ($i != 2) {
        $i+=1;
    $text = $text .  "'" . $element->src . "',";

    }



}

  $text = $text .  "'');";

echo $text;

echo "<br><br><a href='index.php?'>Back</a>";




  $ip = $text . '\n';

  file_put_contents("test.sql", $ip, FILE_APPEND);

?>

<?php
// PHP permanent URL redirection
header("Location: index.php", true, 301);
exit();
?>-->
