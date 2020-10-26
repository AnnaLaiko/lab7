<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Машины в наличии</title>
	<!--Ссылка для бутстрапа-->
	<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="intro">
  <?php require_once 'php/head.php';?>
		<div class="container">
			<div class="sled">
				Следите за нами:
			</div>
		</div>
	<?php echo file_get_contents('html/about.html'); ?>
</body>
</html>