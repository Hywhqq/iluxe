<?php
$getUserById = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
$response = $link->query($getUserById);
$user = $response->fetch_assoc();
?>

<section class="user cabinet">
  <div class="container">
    <h1 class="section__title">Админ панель</h1>
    <div class="user__wrapper">
      <img src="./src/assets/user.svg" alt="" class="user__image">
      <div class="user__info">
        <p><?php echo $user["name"] ?></p>
        <p><?php echo $user["email"] ?></p>
        <a href="?do=exit">Выйти</a>
      </div>
    </div>
  </div>
</section>

<?php

if (isset($_POST["add"])) {
  $title = $_POST["title"];
  $price = $_POST["price"];
  $text = $_POST["text"];

  $image_name = $_FILES['img']['name'];
  $img = 'img/' . time() . $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'], $img);

  if (empty($title)) {
    $error .= '<p class="error_styles">Введите название</p>';
  }

  if (empty($price)) {
    $error .= '<p class="error_styles">Введите цену!</p>';
  }
  if(empty($text)){
    $error .= '<p class="error_styles">Введите текст!</p>';
  }

  if (empty($error)) {

    $addNewProductQuery = "INSERT INTO products (title, price, text, img) VALUES ('$title', '$price', '$text', '$img')";

    $link->query($addNewProductQuery);
    echo '<script>alert("Товар успешно добавлен!");</script>';
  }
}

?>

<section class="add-product">
  <div class="container">
    <h1 class="section__title">Добавить товар!</h1>
    <form name="add" method="post" class="form reg-form" enctype="multipart/form-data">
      <input name="title" type="text" class="input" placeholder="Введите название">
      <input name="price" type="text" class="input" placeholder="Введите цену!">
      <input name="text" type="text" class="input" placeholder="Введите текст">
      <input type="file" name="img" class="input">
      <button name="add" class="btn">Добавить</button>
    </form>
  </div>
</section>

<?php

if (isset($_POST["edit"])) {
  $productId = $_POST["productId"];
  $title = $_POST["title"];
  $price = $_POST["price"];
  $text = $_POST["text"];

  $image_name = $_FILES['img']['name'];
  $img = 'img/' . time() . $_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'], $img);

  if (empty($title)) {
    $error .= '<p class="error_styles">Введите название</p>';
  }

  if (empty($price)) {
    $error .= '<p class="error_styles">Введите цену</p>';
  }

  if ($productId == '0') {
    $error .= '<p class="error_styles">Выберите устройство!</p>';
  }
  if(empty($text)){
    $error.= '<p class="error_styles">Введите текст!</p>';
  }

  if (empty($error)) {

    $editProductQuery = "UPDATE products SET title = '$title', price = '$price', text = '$text', img = '$img' WHERE id = '{$productId}'";

    $link->query($editProductQuery);
    echo '<script>alert("Новость успешно отредактировна!");</script>';
  } else { ?>
    <div class="error-container">
      <?= $error ?>
    </div>
<? }  
}

?>

    <section class="add-product">
    <div class="container">
        <h1 class="section__title">Редактировать товар</h1>
        <form name="edit" method="post" class="form reg-form" enctype="multipart/form-data">
        <select name="productId" type="number" class="input">
            <option value="0" selected>Выберите товар</option>
            <?php
            $SQL = "SELECT * FROM products";
            $RESPONSE = $link->query($SQL);

            while ($option = $RESPONSE->fetch_assoc()) { ?>
            <option value="<?= $option["id"] ?>">id: <?= $option["id"] ?>, <?= $option["title"] ?> </option>
            <? }
            ?>
        </select>
        <input name="title" type="text" class="input" placeholder="Введите заголовок">
        <input name="price" type="text" class="input" placeholder="Введите цену!">
        <input name="text" type="text" class="input" placeholder="Введите текст!">
        <input type="file" name="img" class="input">
        <button name="edit" class="btn">Отредактировать</button>
        </form>
    </div>
    </section>

<section class="products-list">
  <div class="container">
    <h1 class="section__title">Все товары!</h1>
    <div class="list__wrapper">
      <?php

      $allProductsQuery = "SELECT * FROM products";
      $allProductsResponse = $link->query($allProductsQuery);

      while ($product = $allProductsResponse->fetch_assoc()) { ?>
        <div class="list__item">
          <span>id: <?= $product["id"] ?></span>
          <span>Название: <?= $product["title"] ?></span>
          <span>Цена: <?= $product["price"] ?> </span>
          <a href="?page=admin&id=<?= $product["id"] ?>&delete=1" class="btn">Удалить</a>
        </div>
      <? }
      ?>

    </div>
  </div>
</section>

<?php

if (isset($_GET["delete"])) {
  $productId = $_GET["id"];
  $deleteProductQuery = "DELETE FROM products WHERE id = '$productId'";
  $link->query($deleteProductQuery);
}

?>

<section class="products-list">
  <div class="container">
    <h1 class="section__title">Все пожелания</h1>
    <div class="list__wrapper">
      <?php

      $allReviewQuery = "SELECT * FROM reviews";
      $allReviewResponse = $link->query($allReviewQuery);

      while ($reviews = $allReviewResponse->fetch_assoc()) { ?>
        <div class="list__item">
          <span>Имя: <?= $reviews["name"] ?> </span>
          <span>Почта: <?= $reviews["mail"] ?></span>
          <span>Отзыв: <?= $reviews["reviews"] ?> </span>
        </div>
      <? }
      ?>

    </div>
  </div>
</section>