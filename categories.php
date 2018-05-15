<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Coming soon..</title>
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" href="assets/bootstrap.min.css">
      <script src="assets/bootstrap.min.js"></script>
      <script src="assets/jquery-3.3.1.slim.min.js"></script>
  </head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">All Of Them Are Here</a>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="Categories.php">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>


  <div id="category">
  <table id="cleft" class="table table-hover table-bordered">

    <?php
     $cnt = 1;
      require_once 'db.php';
      try {
         $list = $db->query("select distinct category from products")->fetchAll(PDO::FETCH_ASSOC) ;


         foreach($list as $row) {

             if($cnt % 2 == 1){
               echo "<tr>" ;
             echo "<td><a href=products.php?category={$row['category']}>{$row['category']}</a></td>" ;
               $cnt = $cnt + 1;


           }
           else {


              $cnt = $cnt + 1;
              echo "</tr>" ;
           }


      }
      echo '</table>  <table id="cleft" class="table table-hover table-bordered" >';
$cnt = 1;
      foreach($list as $row) {

          if($cnt % 2 == 0){
            echo "<tr>" ;
          echo "<td><a href=products.php?category={$row['category']}>{$row['category']}</a></td>" ;
            $cnt = $cnt + 1;


        }
        else {


           $cnt = $cnt + 1;
           echo "</tr>" ;
        }




   }
      } catch(Exception $ex) {
          echo "<p>DB Error : " . $ex->getMessage() . " </p>";
      }
?>
</table>
</div>
</body>
</html>
