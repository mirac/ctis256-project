<?php
require_once "include/header.php";
require_once "include/categories.php";
?>
    <br>
    <div id="container">

        <!-- promotional Products -->
        <?php
        $item = $_GET["id"];
        try {

            $stmt = $db->prepare("select * from products where id = ?");
            $stmt->execute([$item]);
            $list = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($list as $row) {
                $itemcnt = 0;

                echo "<h1>" . $row['title'] . "</h1><br>";

                echo '<div id="leftpart"><div id="desc">' . $row['description'] . "</div>";
                echo "<br><h1 style ='float: left; margin-left: 25%; margin-top: 30px;'>₺ " . $row['price'];
                echo '<br><button class="btn btn-primary btn-lg" type="submit"  onclick="javascript:addBasket('.$row['id'].');">Add to Cart <i class="fas fa-cart-arrow-down"></i></button></h1><br>';
                echo '<br>';

                echo '</div>';
                echo '<div id="rightpart"><img src="';
                echo $row['image'];
                echo '"><br>';
                echo '</div>';
                echo '<hr>';


                $comment_stmt = $db->prepare("select * from comments join users on (users.email = comments.customer_email) where product_id = ?");
                $comment_stmt->execute([$item]);
                $list_comment = $comment_stmt->fetchAll(PDO::FETCH_ASSOC);
                echo '<div id="comments"><h3>Comments</h3>';

                if ($comment_stmt->rowCount() > 0) {

                    foreach ($list_comment as $row_comment) {

                        echo '<div id="comment"><div class="alert alert-success" role="alert">';
                        echo $row_comment['full_name'] . '</div>';
                        echo '<span id="comment_text">' . $row_comment['comment'] . '</span></div>';

                    }
                    echo '</div>';
                } else {
                    echo '<div id="no_comment"><div class="alert alert-success" role="alert">There is no comment to show</div></div>';

                }

                if (!empty($_SESSION['user'])) {
                    echo '<form method="POST" action="add_comment.php">';
                    echo '<input name="id" type="hidden" value="' . $item . '">';
                    echo '<textarea name="comment" type="text" id="inputEmail" class="form-control" placeholder="Comment" required></textarea>';
                    echo '<button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Add Comment</button>';
                    echo '</form>';
                }
            }
        } catch (Exception $ex) {
            echo "<p>DB Error : " . $ex->getMessage() . " </p>";
        }
        ?>

    </div>

<?php require_once "include/footer.php" ?>