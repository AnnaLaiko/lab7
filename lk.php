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
    <!-- Подключаем API -->
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
    <!-- Подключаем jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <!-- https://github.com/yandex/mapsapi-area -->
    <script src="https://yastatic.net/s3/mapsapi-jslibs/area/0.0.1/util.calculateArea.min.js" type="text/javascript"></script>
</head>
<body class="intro" style="background-color:rgba(0,0,0,0.95)">
  <?php require_once 'php/head.php';?>
        <div>
            <div style="height:30vh"></div>
            <?php if(isset($_SESSION['message'])) echo '<div class="alert alert-success text-center" style="font-size: 20px;" role="alert">' . $_SESSION['message'] . '</div>' . '<div style="height:2.5vh"></div>';
            unset($_SESSION['message']);
            ?>
            <p class="text-center font-weight-bold" style="font-size: 30px; color:black">Здравствуйте, <?php echo $_SESSION['user']['name']?></p>
            <a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="drivers.php" style="margin-top:2.5vh">Посмотреть Наших водителей</a>
            <?php
                if($_SESSION['user']['rank']>=2):
                    echo '<a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="crud.php" style="margin-top:2.5vh">Открыть таблицу  </a>';
                    echo '<a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="search.php" style="margin-top:2.5vh">Поиск  </a>';
                endif;
            ?>
            <a type="button" class="btn btn-dark btn-lg btn-block font-weight-bold" href="php/logout.php" style="margin-top:2.5vh">Выйти</a>
        </div>

        <div style="margin-top: 10px;">
            <p class="text-center">
                <button class="btn btn-dark btn-sm font-weight-bold" id="startDrawing">Включить режим редактирования</button>
                <button class="btn btn-dark btn-sm font-weight-bold" id="stopDrawing">Отключить режим редактирования</button>
                <button class="btn btn-dark btn-sm font-weight-bold" id="calculateArea">Определить площадь полигона</button>
                <div id="map" style="width: 400px; height: 400px; margin-left: 40%;"></div>
                <script src="js/yandex.js"></script>
            </p>
        </div>



	<?php echo file_get_contents('html/about.html'); ?>
</body>
</html>