<?php 
session_start();
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<=0)
{
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Мат. Фильтр</title>
	<!--Ссылка для бутстрапа-->
	<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="intro">
  <?php require_once 'php/head.php';?>

  	<form action="php/add.php" method="POST">
        <div style="height:30vh"></div>
        <?php if(isset($_SESSION['Accept'])) echo '<div class="alert alert-success text-center" style="font-size: 20px;" role="alert"> Успешено: ' . $_SESSION['Accept'] . ' Неуспешно:' . $_SESSION['Repeat'] .  '</div>' . '<div style="height:2.5vh"></div>';
        unset($_SESSION['Accept']);
        unset($_SESSION['Repeat']);
        ?>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Введите список добавляемых слов:</p>
        <input type="text" class="form-control" name="text" placeholder="Comment">
        <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold" style="margin-top:2.5vh">Занести</button>
    </form>
    <div class="container">
      <div class="sled1">
        Следите за нами:
      </div>
    </div>
  <?php echo file_get_contents('html/about.html'); ?>
</body>
</html>