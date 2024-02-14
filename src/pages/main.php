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

  <section class="slider">
    <div class="slide">
      <img src="./src/assets/slide-image-1.png" alt="Slide 1">
    </div>
    <div class="slide hidden">
      <img src="./src/assets/slide-image-2.png" alt="Slide 1">
    </div>
    <div class="slide hidden">
      <img src="./src/assets/slide-image-3.png" alt="Slide 1">
    </div>

    <div class="dots">
      <div class="dot dot-active"></div>
      <div class="dot"></div>
      <div class="dot"></div>
    </div>
  </section>

  <section class="hits">
    <div class="container">
      <h1 class="section__title">Новые продукты!</h1>
      <div class="hits__wrapper">
        <?php
        $getProductsSQL = "SELECT * FROM products LIMIT 3";
        $productsResponse = $link->query($getProductsSQL);

        while ($product = $productsResponse->fetch(PDO::FETCH_ASSOC)) { ?>
          <a href="?page=product&id=<?= $product["id"] ?>" class="card">
            <img src="<?= $product["img"] ?>" alt="IPhone" class="card__image">
            <div class="card__info">
              <p class="card__title"><?= $product["title"] ?></p>
              <p class="card__price"><?= $product["price"] ?> ₽</p>
              
            </div>
            <button class="btn">Подробнее!</button>
          </a>
        <? }
        ?>
      </div>
    </div>
  </section>

  <section class="about" id="about">
    <div class="container">
      <h1 class="section__title">О нас</h1>
      <div class="about__wrapper">
        <div class="about__info">
          <span class="about">Айлюкс - это качественный сервис и индивидуальный подход к каждому клиенту.
Мы не гонимся за быстрой выгодой, поэтому результат нашей работы - сотни довольных клиентов любителей Apple iPhone, которые советуют нас своим друзьям и близким. Мы делаем все, чтобы бренд Айлюкс ассоциировался со словами "надежность" и "качество". <br>

На витринах нашего магазина вы найдете только самые лучшие и актуальные устройства и аксессуары.</span>
          <br>
          <br>
          <span></span>
        </div>
        <img src="./src/assets/about-image.png" alt="About us" class="about__image">
      </div>
    </div>
  </section>

<?php 

if (isset($_POST["review"])) {
  $name = $_POST["name"];
  $mail = $_POST["mail"];
  $reviews = $_POST["reviews"];

  if (empty($name)) {
    $error .= '<p class="error_styles">Введите имя</p>';
  }

  if (empty($mail)) {
    $error .= '<p class="error_styles">Введите почту!</p>';
  }
  if(empty($reviews)){
    $error .= '<p class="error_styles">Введите пожелания!</p>';
  }

  if (empty($error)) {

    $addNewReviewQuery = "INSERT INTO reviews (name, mail, reviews) VALUES ('$name', '$mail', '$reviews')";

    $link->query($addNewReviewQuery);
    echo '<script>alert("Пожелания успешно отправлены нам, спасибо!");</script>';
  }
  $error;
}

?>

          
  <!-- <section class="review">
    <div class="container">
      <h1 class="section__title">Что вы бы хотели видеть в нашем новостном блоге?</h1>
      <form class="form review__form">
        <input type="name" class="input" placeholder="Ваше имя">
        <input type="email" class="input" placeholder="Ваша почта">
        <input type="reviews" class="input" placeholder="Ваш отзыв">
        <button name="add" class="btn">Отправить</button>
      </form>
    </div>
  </section> -->
  <section class="add-review">
  <div class="container">
    <h1 class="section__title">Что вы бы хотели видеть в нашем магазине?</h1>
    <form name="review" method="post" class="form reg-form" enctype="multipart/form-data">
      <input name="name" type="text" class="input" placeholder="Введите имя">
      <input name="mail" type="email" class="input" placeholder="Введите почту!">
      <input name="reviews" type="text" class="input" placeholder="Введите пожелания">
      <button name="review" class="btn">Отправить</button>
    </form>
  </div>
</section>

  <script src="./src/js/slider.js"></script>
</body>

</html>