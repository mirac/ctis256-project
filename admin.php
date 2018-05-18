<?php
require_once "include/header.php";


if(empty($_SESSION) || $_SESSION['role'] == 0)
{

    header("Location: 404.php");
    exit;
}

else {

    echo '<br><div id="addproduct"><p class="h1">Welcome ' . $_SESSION['fullname'] . "</p>";


}
    ?>



<form method="POST" action="addpro.php" class="form-signin">

    <h1 class="h3 mb-3 font-weight-normal">Add Product</h1>

    <label for="inputCategory" class="sr-only">Category of the product</label>
    <input name="category" type="text" id="inputEmail" class="form-control" placeholder="Category" required autofocus>
<br>
    <label for="inputBrand" class="sr-only">Brand</label>
    <input name="brand" type="text" id="inputEmail" class="form-control" placeholder="Brand" required>
    <br>
    <label for="Title" class="sr-only">Title</label>
    <input name="title" type="text" id="inputEmail" class="form-control" placeholder="Title" required>
    <br>
    <label for="Description" class="sr-only">Description</label>
    <textarea name="description" type="text" id="inputEmail" class="form-control" placeholder="Description" required></textarea>
        <br>
    <label for="Image" class="sr-only">Image</label>
    <input name="image" type="text" id="inputEmail" class="form-control" placeholder="Image" required>
    <br>
    <label for="Price" class="sr-only">Price</label>
    <input name="price" type="text" id="inputEmail" class="form-control" placeholder="Price" required>
    <br>
    <label>
        <input type="checkbox" name="promotional" value="1"> Promotional
    </label>
    <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Add Product</button>

</form>
</div>

