<section class="catalog">
  <div class="container">
    <h1 class="section__title">Каталог</h1>
    <div class="catalog__wrapper">
      <?php
      $allProductsQuery = "SELECT * FROM products";
      $allProductsResponse = $link->query($allProductsQuery);

      while ($product = $allProductsResponse->fetch_assoc()) { ?>
        <a href="?page=product&id=<?= $product["id"] ?>" class="card">
          <img src="<?= $product["img"] ?>" alt="IPhone" class="card__image">
          <div class="card__info">
            <p class="card__title"><?= $product["title"] ?></p>
            <p class="card__price"><?= $product["price"] ?> P</p>
          </div>
          <button class="btn">Читать</button>
        </a>
      <? }
      ?>
    </div>
  </div>
</section>