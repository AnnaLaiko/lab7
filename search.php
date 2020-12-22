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
	<title>Поиск</title>
	<!--Ссылка для бутстрапа-->
	<?php include_once 'html/head.html'; ?>
</head>
<body class="login drive_body bg-warning">
    <?php require_once 'php/head.php';?>

    <div style="height:30vh"></div>
    <div class="container mt-5 ">
        <div class="search_box">
            <form action="">
                <input type="text" name="search" id="search" placeholder="Введите запрос" class="form-control" value="<?php if(isset($_GET['search'])) echo htmlentities($_GET['search']); ?>">

                <p class="text-center">
                <button type="submit" class="btn btn-lg btn-info font-weight-bold text-dark">Поиск</button>
                </p>
            </form>
            <?php include "php/search.php"; ?>
            <div id="search_box-result"></div>
        </div>
    </div>
</body>
