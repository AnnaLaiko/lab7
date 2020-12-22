<?php
session_start();
require_once 'php/connect.php';
if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
	header('Location: index.php');
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Детальный просмотр</title>
	<!--Ссылка для бутстрапа-->
	<?php include_once 'html/head.html'; ?>
</head>
<body class="login drive_body bg-warning">
<?php require_once 'php/head.php';?>

<div style="height:30vh"></div>
<div class="container mt-5 ">
	<div class="info_box" style="color:black">
        <?php include 'php/detail.php'?>
	</div>
</div>
</body>
