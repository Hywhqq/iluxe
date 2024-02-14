<script src=".js/index.js"></script>
<header class="header">
  <div class="container">
    <div class="header__wrapper">
      <div class="header__logo">
        <a href="?" class="logo"><span></span>iLuxe</a>
      </div>
      <nav class="header__nav">
        <a href="?page=catalog" class="nav__link">Каталог</a>
        <a href="#about" class="nav__link">О нас</a>

        <?php
        if (isset($_SESSION["uid"])) {
          $checkRoleQuery = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
          $result = $link->query($checkRoleQuery);
          $user = $result->fetch(PDO::FETCH_ASSOC);

          if ($user["role"] == 1) {
            echo '<a href="?page=user" class="nav__link">Личный кабинет</a>';
          } else {
            echo '<a href="?page=admin" class="nav__link">Админ панель</a>';
          }
        } else {
          echo '<a href="?page=register" class="nav__link">Войти в аккаунт</a>';
        }
        ?>


      </nav>
      <div class="header__info">
    
        <? if ($user["role"] == 1) {
            echo '<a href="?page=korzina" class ="nav_link">Корзина </a>';
        }
        if ($user["role"] == 2) {
            echo '<a href="?page=korzina" class ="nav_link">Корзина </a>';
        }



        ?>
        
      </div>
    </div>

</header>