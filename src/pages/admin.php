<?php
$getUserById = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
$response = $link->query($getUserById);
$user = $response->fetch(PDO::FETCH_ASSOC);
?>

<section class="user cabinet">
  <div class="container">
    <h1 class="section__title">Админ панель</h1>
    <div class="user__wrapper">
      <img src="./src/assets/user.svg" alt="" class="user__image">
      <div class="user__info">
      <p>Имя: <?= $user["name"] ?></p>
        <p>Почта:   <?= $user["email"] ?></p>
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
  $cat = $_POST["category"];

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

    $addNewProductQuery = "INSERT INTO products (title, price, text, category, img) VALUES ('$title', '$price', '$text', '$cat', '$img')";

    $link->query($addNewProductQuery);
    echo '<script>alert("Товар успешно добавлен!");</script>';
  } else { ?>
    <div class="error-container">
      <?= $error ?>
    </div>
<? }
}

?>

<section class="add-product">
  <div class="container">
    <h1 class="section__title">Добавить товар!</h1>
    <form name="add" method="post" class="form reg-form" enctype="multipart/form-data">
      <input name="title" type="text" class="input" placeholder="Введите название">
      <input name="price" type="text" class="input" placeholder="Введите цену!">
      <select name="category">
        <option value="0"> Выберите категорию</option>
        <?php
        $query= "SELECT * FROM category";
        $result=$link->query($query);
        while($cat=$result->fetch(PDO::FETCH_ASSOC)){
            echo '<option value="'.$cat['id'].'">'.$cat['name'].'</option>';
        }

        ?>
</select>
      <textarea name="text" class="input" id="" cols="30" rows="10">Введите описание!</textarea>
      <input type="file" name="img" class="input">
      <button name="add" class="btn">Добавить</button>
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

      while ($product = $allProductsResponse->fetch(PDO::FETCH_ASSOC)) { ?>
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

      while ($reviews = $allReviewResponse->fetch(PDO::FETCH_ASSOC)) { ?>
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