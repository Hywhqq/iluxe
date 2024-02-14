<?php

if (isset($_POST["auth"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $hashPassword = md5($password);

  if (empty($email)) {
    $error .= '<p class="error_styles">Введите email</p>';
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error .= '<p class="error_styles">Неправильный формат ввода email</p>';
    }

    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $link->query($checkEmailQuery);
    $num = $result->fetch(PDO::FETCH_ASSOC);

    if ($num == 0) {
      $error .= '<p class="error_styles">Вы не зарегистрированы</p>';
    } else {
      $user = $link -> query( "SELECT * FROM users WHERE email = '$email' AND password = '$hashPassword'") -> fetch(PDO::FETCH_ASSOC);



      if ($num == 0) {
        $error .= '<p class="error_styles">Неправильный email или пароль</p>';
      }
    }
  }

  if (empty($password)) {
    $error .= '<p class="error_styles">Введите пароль</p>';
  }

  if (empty($error)) {
    $uid = $user['id'];
    $_SESSION['uid'] = $uid;

    echo '<script>document.location.href="?"</script>';
  } else { ?>
    <div class="error-container">
      <?= $error ?>
    </div>
<? }
}

?>

<section class="login">
  <div class="container">
    <h1 class="section__title">Авторизация</h1>
    <form name="auth" method="post" class="form reg-form">
      <input name="email" type="email" class="input" placeholder="Введите почту">
      <input name="password" type="password" class="input" placeholder="Введите пароль">
      <button name="auth" class="btn">Войти</button>
    </form>
    <div class="redirect">
      <span>Еще нет аккаунта?</span>
      <a href="?page=register">Регистрация</a>
    </div>
  </div>
</section>