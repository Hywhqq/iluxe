<section class="catalog">
  <div class="container">
    <h1 class="section__title">Каталог</h1>
    <div class="cat">
    <?php
      echo '<a href="?page=catalog" class="nav__link">Все устройства</a>';
      $cat_list_sql="SELECT * FROM category";
      $result2=$link->query($cat_list_sql);
      while($product_cat=$result2->fetch(PDO::FETCH_ASSOC)){
        echo '<a class="nav__link" href="?page=catalog&category='.$product_cat["id"].'">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'.$product_cat["name"].'</a>';
      }

      if(isset($_GET['category'])){
        $get_category=$_GET['category'];
        $sql="WHERE category=$get_category";
      }else{
        $sql='';
      }
      ?>
    </div>
    <div class="catalog__wrapper">
      <?php



      $allProductsQuery = "SELECT * FROM products $sql";
      $allProductsResponse = $link->query($allProductsQuery);

      while ($product = $allProductsResponse->fetch(PDO::FETCH_ASSOC)) { ?>
        <a href="?page=product&id=<?= $product["id"] ?>" class="card">
          <img src="<?= $product["img"] ?>" alt="IPhone" class="card__image">
          <div class="card__info">
            <p class="card__title"><?= $product["title"] ?></p>
            <p class="card__price"><?= $product["price"] ?> ₽</p>
          </div>
          <button class="btn">Подробнее</button>
        </a>
      <? }
      ?>
    </div>
  </div>
</section>