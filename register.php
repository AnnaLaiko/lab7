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