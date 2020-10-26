<?php 
session_start();
if(isset($_SESSION['user']))
{
    header('Location: lk.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <!--Ссылка для бутстрапа-->
<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="login drive_body">
  <?php require_once 'php/head.php';?>
    <form action="php/signin.php" method="POST">
        <div style="height:30vh"></div>
        <?php if(isset($_SESSION['message'])!=NULL) echo '<div class="alert alert-success text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>' . '<div style="height:2.5vh"></div>';
        unset($_SESSION['message']);
        ?>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Логин</p>
        <input type="text" class="form-control" name="username" placeholder="Username">
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Пароль</p>
        <input type="password" class="form-control" name="password" placeholder="Password">
        <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold" style="margin-top:2.5vh">Авторизоваться</button>
        <a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="register.php" style="margin-top:2.5vh">Зарегистрироваться</a>
    </form>
</body>
</html>