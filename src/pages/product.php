<?php
if (isset($_GET)) {
  $productId = $_GET["id"];

  $getProductSQL = "SELECT * FROM products WHERE id = '$productId'";
  $productResponse = $link->query($getProductSQL);
  $product = $productResponse->fetch_assoc();
}
?>

<section class="product">
  <div class="container">
    <h1 class="section__title"><?= $product["title"] ?></h1>
    <div class="product__wrapper">
      <img src="<?= $product["img"] ?>" class="image">
      <p class="product-price"><?= $product["price"] ?></p>
      <p class="card__price"><?= $product["text"] ?></p>
      <button class="btn">Оценить!</button>
    </div>
  </div>
</section>