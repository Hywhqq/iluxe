<?php 
  $getUserById = "SELECT * FROM users WHERE id='{$_SESSION['uid']}'";
  $response = $link -> query($getUserById);
  $user = $response -> fetch_assoc;
?>

<section class="user cabinet">
  <div class="container">
    <h1 class="section__title">Личный кабинет</h1>
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