<?php


    require_once('include/db.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {

                $category = $_POST['category'];
                $brand = $_POST['brand'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $image = $_POST['image'];
                $price = $_POST['price'];

            if (!isset($_POST['promotional'])) {
                $promotional = 0;
            } else {
                $promotional = 1;
            }

               // echo $category . '<br>' .  $brand. '<br>' . $title. '<br>' . $description. '<br>' .$image. '<br>' .$price. '<br>' .$promotional;

               $sql = "INSERT INTO products (`category`, `brand`, `title`, `description`, `image`, `price`, `promotional` )  values(?, ?, ?, ?, ?, ?, ?) ";
               $stmt = $db->prepare($sql);
               $stmt->execute([$category, $brand, $title, $description, $image, $price,$promotional]);

            }



        }




?>


