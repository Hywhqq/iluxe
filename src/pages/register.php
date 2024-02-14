<?php

if (isset($_POST["register"])) {
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmPassword = $_POST["confirmPassword"];

  $usersWithTheSameEmailQuery = "SELECT * FROM users WHERE email = '$email'";
  $usersWithTheSameEmailResponse = $link->query($usersWithTheSameEmailQuery);
  $usersWithTheSameEmail = $usersWithTheSameEmailResponse->fetch(PDO::FETCH_ASSOC);

  if ($usersWithTheSameEmail) {
    $error .= '<p class="error_styles">Вы уже зарегистрированы</p>';
  } else {
    if (empty($name)) {
      $error .= '<p class="error_styles">Введите Имя</p>';
    } else {
      if (strlen($name) < 3) {
        $error .= '<p class="error_styles">Имя не может быть меньше 5 символов</p>';
      }
    }

    if (empty($email)) {
      $error .= '<p class="error_styles">Введите email</p>';
    } else {
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= '<p class="error_styles">Неправильный формат ввода email</p>';
      }
    }

    if (empty($password)) {
      $error .= '<p class="error_styles">Введите пароль</p>';
    } else {
      if (strlen($password) < 6) {
        $error .= '<p class="error_styles">пароль не может быть меньше 6 символов</p>';
      }
    }

    if (empty($confirmPassword)) {
      $error .= '<p class="error_styles">Введите подтверждающий пароль</p>';
    } else {
      if ($confirmPassword != $password) {
        $error .= '<p class="error_styles">Пароли не совпадают</p>';
      }
    }
  }

  if (empty($error)) {
    $hashPassword = md5($password);
    $createUserQuery = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$hashPassword', 1)";
    $link->query($createUserQuery);
    echo '<script>document.location.href="?page=login"</script>';
  } else { ?>
    <div class="error-container">
      <?= $error ?>
    </div>
<? }
}

?>

<section class="reg">
  <div class="container">
    <h1 class="section__title">Регистрация</h1>
    <form name="register" method="post" class="form reg-form">
      <input name="name" type="text" class="input" placeholder="Введите имя">
      <input name="email" type="email" class="input" placeholder="Введите почту">
      <input name="password" type="password" class="input" placeholder="Введите пароль">
      <input name="confirmPassword" type="password" class="input" placeholder="Повторите пароль">
      <button name="register" class="btn">Регистрация</button>
    </form>
    <div class="redirect">
      <span>Уже есть аккаунт?</span>
      <a href="?page=login">Войти</a>
    </div>
  </div>
</section>