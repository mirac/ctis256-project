<!-- Category Start -->
<div id="maincategory">
    <table class="table table-hover table-sm table-bordered">
        <thead class="thead-dark">
        <TR>
            <th>Categories</th>
        </tr>
        </thead>

        <?php

        if(isset($_GET["category"]))
        {
            $category = $_GET["category"];

        }
        else{
            $category = NULL;

        }


        try {
            $list = $db->query("select distinct category from products")->fetchAll(PDO::FETCH_ASSOC);
            foreach ($list as $row) {
                echo "<tr>";
                if ($category == $row['category']) {
                    echo "<td>{$row['category']}</td>";

                } else {
                    echo "<td><a href=product_list.php?category={$row['category']}>{$row['category']}</a></td>";
                }
                echo "</tr>";
            }
        } catch (Exception $ex) {
            echo "<p>DB Error : " . $ex->getMessage() . " </p>";
        }
        ?>
    </table>
</div>
