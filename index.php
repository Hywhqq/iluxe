<?php
session_start();
require_once('./src/connect.php');
if (isset($_SESSION['uid'])) {
    $getUser = $link -> query("SELECT * FROM users WHERE id = {$_SESSION['uid']}") -> fetch(PDO::FETCH_ASSOC);
    $id_user = $getUser['id'];

}

if ($_REQUEST['do'] == 'exit') {
  session_unset();
}
if(isset($_GET['addToCart'])) {
    $productId = $_GET['addToCart'];

    $getCountProducts = "SELECT * FROM cart WHERE id_product = '$productId' AND id_user = '$id_user'";
    $allCountsResponse = $link -> query($getCountProducts);
    $countProducts = $allCountsResponse -> fetch(PDO::FETCH_ASSOC);


    if ($countProducts == '') {
        $countProducts = [];
    }

    if(empty($countProducts)) {
        $getCart = "INSERT INTO cart (id_product, id_user, count) VALUES ('$productId', '$id_user', '1')";
        $link -> query($getCart);
    } else {
        $currentCount = $countProducts['count']+1;
        $updateCount = "UPDATE cart SET count = '$currentCount' WHERE id_product = '$productId' AND id_user = '$id_user'";
        $link -> query($updateCount);
    }

    echo '<script>document.location.href="?page=korzina";
    alert("Вы добавили товар в корзину!");</script>';

}

if(isset($_GET['deleteCart'])) {
    $cartId = $_GET['deleteCart'];
 
    $getAllCart = "SELECT * FROM cart WHERE id = '$cartId'";
    $getAllCartResponse = $link -> query($getAllCart);
    $deleteCart = $getAllCartResponse -> fetch(PDO::FETCH_ASSOC);

    if($deleteCart['count'] <= 1) {
        $deleteFromCart = "DELETE FROM cart WHERE id = '$cartId'";
        $link -> query($deleteFromCart);
    } else {
        $currentCount = $deleteCart['count']-1;
        $updateCount = "UPDATE cart SET count = '$currentCount' WHERE id = '$cartId'";
        $link -> query($updateCount);
    }
    echo '<script>document.location.href="?page=korzina";
    alert("Вы удалили 1 товар");</script>';
}
if(isset($_GET['deleteAllCart'])) {
    $deleteFromCart = "DELETE FROM cart WHERE id_user = '$id_user'";
    $link -> query($deleteFromCart);
    echo '<script>document.location.href="?page=korzina"; 
    alert("Все товары были удалены!");</script>';
}


if(isset($_GET['checkout'])) {
    echo '<script>document.location.href="?"; 
    alert("Вы оформили заказ!");</script>';
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
    if ($_GET["page"] == "edit") {
        include("./src/pages/edit.php");
    }
    if ($_GET["page"] == "oplata") {
      include("./src/pages/oplata.php");
    }
    if ($_GET["page"] == "korzina") {
      include("./src/pages/korzina.php");
    }
  } else {
    include("./src/pages/main.php");
  }

  include("./src/components/footer.php");
  ?>


  <script src="./src/js/slider.js"></script>
</body>

</html>