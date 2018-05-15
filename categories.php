<?php
require_once "include/header.php";
?>


<div id="category">
    <table id="cleft" class="table table-hover table-bordered">

        <?php
        $cnt = 1;
        require_once 'db.php';
        try {
            $list = $db->query("select distinct category from products")->fetchAll(PDO::FETCH_ASSOC);


            foreach ($list as $row) {

                if ($cnt % 2 == 1) {
                    echo "<tr>";
                    echo "<td><a href=product_list.php?category={$row['category']}>{$row['category']}</a></td>";
                    $cnt = $cnt + 1;


                } else {


                    $cnt = $cnt + 1;
                    echo "</tr>";
                }


            }
            echo '</table>  <table id="cleft" class="table table-hover table-bordered" >';
            $cnt = 1;
            foreach ($list as $row) {

                if ($cnt % 2 == 0) {
                    echo "<tr>";
                    echo "<td><a href=product_list.php?category={$row['category']}>{$row['category']}</a></td>";
                    $cnt = $cnt + 1;


                } else {


                    $cnt = $cnt + 1;
                    echo "</tr>";
                }


            }
        } catch (Exception $ex) {
            echo "<p>DB Error : " . $ex->getMessage() . " </p>";
        }
        ?>
    </table>
</div>

<?php require_once "include/footer.php" ?>