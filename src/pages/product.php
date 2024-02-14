<?php
if (isset($_GET)) {
  $productId = $_GET["id"];

  $getProductSQL = "SELECT * FROM products WHERE id = '$productId'";
  $productResponse = $link->query($getProductSQL);
  $product = $productResponse->fetch(PDO::FETCH_ASSOC);
}
?>
  <!-- Left Column / Headphones Image -->
  <body>
    <main class="container1">
      <!-- Left Column / Headphones Image -->
      <div class="left-column">
      <img class="" src="<?= $product["img"] ?>" class="image">
        <img data-image="black" src="images/black.png" alt="">
        <img data-image="blue" src="images/blue.png" alt="">
        <img data-image="red" class="active" src="images/red.png" alt="">
      </div>
      <!-- Right Column -->
      <div class="right-column">
        <!-- Product Description -->
        <div class="product-description">
          <span></span> 
        <?php          
        if($user["role"] == 2) {
            echo  '<a class="nav__link" href="?page=edit&id='.$product["id"].' ">EDIT</a>';
          }
        ?>
          <h1><?= $product["title"] ?></h1>
          <?php
    echo '<pre>'.$product["text"].'</pre>';
?>
        </p>
        <h2 class="">
        </h2>
        </div>
        <!-- Product Configuration -->
        <div class="product-configuration">
          <!-- Product Color -->
          <div class="product-color">
            <div class="color"></div>
            <div class="color-choose">
                <div class="kolvo">
                Осталось в наличии:
              <br>  <?= $product["kolvo"] ?>
                </div>
            </div>
          </div>
          <!-- Cable Configuration -->
          <div class="cable-config">
            <div class="color"></div>
            <div class="cable-choose">
            </div>
          </div>
        </div>
        <!-- Product Pricing -->
        <div class="product-price">
          <span><?= $product["price"] ?>₽</span>
          <?php
     if ($user["role"] == 0) {
      echo '<a href="?page=register" class="cart-btn">Купить</a>';
    } else {
      ?> <a href="?addToCart=<?=$product['id']?>" class="cart-btn">Купить</a> <?
    } ?> 
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>


    <hr>


        
    </div>
    </div>
  </body>
