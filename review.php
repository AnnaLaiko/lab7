<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Онлайн сервисы</title>
	<!--Ссылка для бутстрапа-->
	<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="intro">
<?php require_once 'php/head.php';?>

  	<form action="php/cleaning.php" method="POST">
        <div style="height:30vh"></div>
        <?php if(isset($_SESSION['message'])) echo '<div class="alert alert-success text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>' . '<div style="height:2.5vh"></div>';
        unset($_SESSION['message']);
        ?>
        <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Ваш комментарий</p>
        <input type="text" class="form-control" name="text" placeholder="Comment">
        <button type="submit" class="btn btn-primary btn-lg btn-block font-weight-bold" style="margin-top:2.5vh">Вывести</button>
    </form>
    
		<div class="container">
			<div class="sled1">
				Следите за нами:
			</div>
		</div>
	<?php echo file_get_contents('html/about.html'); ?>
</body>
</html>