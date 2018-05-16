
<html>
<?php

require_once 'include/header.php';
?>

<body>

    <div id="basketmain">

        <div id="basketleft">

            <h1>Basket</h1>


                <?php

                foreach ($stmt as $item) {
                    echo '<div id="basketitems">';
                    echo '<img src="' . $item['image'] . '">';
                    echo '</div>';
                }
                ?>


        </div>
        <div id="basketright">

            <p>Deneme</p>

        </div>

    </div>


</body>


</html>
