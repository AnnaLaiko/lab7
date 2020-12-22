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
	<?php echo file_get_contents('html/head.html'); ?>
	
</head>

<body class="registration drive_body">
      <?php require_once 'php/head.php';?>
	<form action="php/regist.php" method="POST">
        <div style="height:35vh"></div>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:white">Логин</p>
        <input type="text" class="form-control" name="login" placeholder="Username">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:white">Почта</p>
        <input type="email" class="form-control" name="email" placeholder="user@mail.ru">
        <p class="text-center font-weight-bold" style="font-size: 30px; color:white">ФИО</p>
        <input type="text" class="form-control" name="fio" placeholder="User A.I.">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:white">Пароль</p>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <p class="text-center font-weight-bold"  style="font-size: 30px; color:white">Подтвердите пароль</p>
        <input type="password" class="form-control" name="password_accept" placeholder="Repeat Password">

        <p class="text-center font-weight-bold" style="font-size: 30px; color:white; margin-top:1vh;">
            <img src="php/captcha.php" alt="captcha" id="captcha-image" style="border-radius: 10px">
            <a class="btn btn-primary font-weight-bold" href="javascript:void(0);" onclick="document.getElementById('captcha-image').src='php/captcha.php?rid=' + Math.random();">
                Обновить капчу
            </a>
            <span>Введите капчу</span>
            <input type="text" name="captcha" style="border-radius: 20px;">
        </p>

        <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold"  style="margin-top:2.5vh; margin-bottom:2.5vh;">Завершить Регистрацию</button>
        <?php if(isset($_SESSION['message'])!=NULL) echo '<div class="alert alert-danger text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']);
        ?>
    </form>
</body>
</html>