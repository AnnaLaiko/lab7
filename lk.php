<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Личный кабинет</title>
	<!--Ссылка для бутстрапа-->
	<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="intro">
  <?php require_once 'php/head.php';?>
    <div>
        <div style="height:30vh"></div>
        <?php if(isset($_SESSION['message'])) echo '<div class="alert alert-success text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>' . '<div style="height:2.5vh"></div>';
        unset($_SESSION['message']);
        ?>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Здравствуйте, <?php echo $_SESSION['user']['name']?></p>
        <a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="drivers.php" style="margin-top:2.5vh">Посмотреть Наших водителей</a>
        <?php 
            if($_SESSION['user']['rank']>=2)
                echo '<a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="crud.php" style="margin-top:2.5vh">Открыть таблицу  </a>'
        ?>
        <a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="php/logout.php" style="margin-top:2.5vh">Выйти</a>
    </div>

	<?php echo file_get_contents('html/about.html'); ?>
</body>
</html>