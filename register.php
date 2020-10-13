<?php
	session_start();
    if(isset($_SESSION['user'])!=NULL)
    {
    header('Location: lk.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<!--Ссылка для бутстрапа-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	
</head>
<body class="registration drive_body">
      <header class="header">
    <div class="container">
      <div class="header__inner">
        <div class="logo">AutoRome</div>
        <nav class="nav">
          <a class="nav_link" href="models.php">Модельный ряд</a>
          <a class="nav_link" href="lk.php">Личный кабинет</a>
          <a class="nav_link" href="drivers.php">Наши водители</a>
          <a class="nav_link" href="cars.php">Автомобили в наличии</a>
          <a class="nav_link" href="online_service.php">Онлайн-сервисы</a>
          <?php if(isset($_SESSION['user'])!=NULL) echo '<a class="nav_link" href="php/logout.php">Выйти</a>'
          ?>
        </nav>
      </div>
    </div>
  </header>
	<form action="php/regist.php" method="POST">
        <div style="height:25vh"></div>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Логин</p>
        <input type="text" class="form-control" name="login" placeholder="Username">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:black">Почта</p>
        <input type="email" class="form-control" name="email" placeholder="user@mail.ru">
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">ФИО</p>
        <input type="text" class="form-control" name="fio" placeholder="User A.I.">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:black">Пароль</p>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:black">Подтвердите пароль</p>
        <input type="password" class="form-control" name="password_accept" placeholder="Repeat Password">
        <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold"  style="margin-top:2.5vh; margin-bottom:2.5vh;">Завершить Регистрацию</button>
        <?php if(isset($_SESSION['message'])!=NULL) echo '<div class="alert alert-danger text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>