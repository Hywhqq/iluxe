<?php
session_start();
include('./src/connect.php');
if (isset($_SESSION['uid'])) {
  $query = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
  $result = $link->query($query);
  $user = $result->fetch_assoc();
  $id_user = $user['id'];
}

if ($_REQUEST['do'] == 'exit') {
  session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ILUXE</title>
  <link rel="stylesheet" href="./src/index.css">
</head>

<body>

  <?php

  include("./src/components/header.php");

  if (isset($_GET["page"])) {
    if (!isset($user)) {
      if ($_GET["page"] == "login") {
        include("./src/pages/login.php");
      }
      if ($_GET["page"] == "register") {
        include("./src/pages/register.php");
      }
    } else {
      if ($_GET["page"] === "login") {
        echo '<script>document.location.href="?"</script>';
      }
      if ($_GET["page"] === "register") {
        echo '<script>document.location.href="?"</script>';
      }
    }
    if ($_GET["page"] == "catalog") {
      include("./src/pages/catalog.php");
    }
    if ($_GET["page"] == "user") {
      if ($user["role"] == '1') {
        include("./src/pages/user.php");
      } else {
        echo '<script>document.location.href="?"</script>';
      }
    }
    if ($_GET["page"] == "admin") {
      if ($user["role"] == '2') {
        include("./src/pages/admin.php");
      } else {
        echo '<script>document.location.href="?"</script>';
      }
    }
    if ($_GET["page"] == "product") {
      include("./src/pages/product.php");
    }
  } else {
    include("./src/pages/main.php");
  }

  include("./src/components/footer.php");
  ?>


  <script src="./src/js/slider.js"></script>
</body>

</html>