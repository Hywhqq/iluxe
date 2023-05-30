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
          $user = $result->fetch_assoc();

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
        <?php
        if (isset($user)) { ?>
          <a href="?page=user" class="header__user">
            <img src="./src/assets/user.svg" alt="User" class="user">
          </a>
        <? }
        ?>
            <div class="cart__modal">
      <div class="cart__wrapper">
        <h5>Корзина</h5>
        <div class="cart-items"></div>
        <div class="cart-info">
          <div class="cart-info_order">
            <p>Итого:</p>
            <div class="cart_line"></div>
            <span class="total-price">21 498 руб. </span>
          </div>
          <div class="cart-info_order">
            <p>Налог 5%:</p>
            <div class="cart_line"></div>
            <span class="total-tax">1074 руб. </span>
          </div>
          <button class="cart-btn">Оформить заказ</button>
        </div>
      </div>
    </div>
    <div class="cart__modal_success">
      <div class="cart__wrapper">
        <h5>Корзина</h5>
        <div class="cart-info">
          <img src="images/cart_successful.svg" alt="Done" />
          <div class="cart-info-details">
            <span> Заказ оформлен! </span>
            <p>Ваш заказ #18 скоро будет передан курьерской доставке</p>
          </div>
          <button class="cart-btn-successful-close">Вернуться назад</button>
        </div>
      </div>
    </div>
  </div>
  
      </div>
    </div>

</header>