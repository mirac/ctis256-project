
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php
// define variables and set to empty values

$name  = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace

  }



}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Site: <input type="text" name="name" value="<?php echo $name;?>">
  <input type="submit" name="submit" value="Submit">
</form>

<?php

if(isset($_POST['submit']))
{
  $newURL = "script.php?id={$name}";
  header('Location: '.$newURL);
}


?>

</body>
</html>
