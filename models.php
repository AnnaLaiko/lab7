<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Модельный ряд</title>
	<!--Ссылка для бутстрапа-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

	<link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/main.css">
	<base target="_blank">
</head>
<body class="models_body">
	<header class="header model">
		<div class="container">
			<div class="header__inner">
				<div class="logo">AutoRome</div>
				<nav class="nav">
					<a class="nav_link" href="models.php">Модельный ряд</a>
					<a class="nav_link" href="lk.php">Личный кабинет</a>
					<a class="nav_link" href="drivers.php">Наши водители</a>
					<a class="nav_link" href="cars.php">Автомобили в наличии</a>
					<a class="nav_link" href="online_service.php">Онлайн-сервисы</a>
					<?php if(isset($_SESSION['user'])!=NULL) echo '<a class="nav_link" href="php/logout.php">Выйти</a>'
          			?>
				</nav>
			</div>
		</div>
	</header>
	<section id="models_rdy">
		<div class="container have">Модели в наличии:</div>
		
		<div class="container-fluid string">
			<div class="row">
				<div class="col-lg-3 rec">
					<img src="css/1.png" 	
					width="330"					
					height="200">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/2.png" 	
					width="350"					
					height="200">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/3.png" 	
					width="330"					
					height="200">
				</div>
			</div>
		</div>
		<div class="container-fluid name">
			<div class="row">
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Mazda CX5</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Toyta Camry</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Honda Civic</a>
				</div>
				
			</div>
		</div>
		<div class="container-fluid string">
			<div class="row">
				<div class="col-lg-3 rec">
					<img src="css/4.png" 	
					width="300"					
					height="150">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/5.png" 	
					width="300"					
					height="200">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/6.png" 	
					width="350"					
					height="200">
				</div>
			</div>
		</div>
		<div class="container-fluid name">
			<div class="row">
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">KIA Rio</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Nissan Qashqai</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Land-Rover Discovery Sport</a>
				</div>
				
			</div>
		</div>
		
		<div class="container-fluid string">
			<div class="row">
				<div class="col-lg-3 rec">
					<img src="css/7.png" 	
					width="300"					
					height="200">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/8.png" 	
					width="350"					
					height="200">
				</div>
				<div class="col-lg-3 rec">
					<img src="css/9.png" 	
					width="300"					
					height="200">
				</div>
			</div>
		</div>
		<div class="container-fluid name">
			<div class="row">
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Hyundai Elantra</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Hyundai Tucson</a>
				</div>
				<div class="col-lg-3 rec_min">
					<a class="nav_link car_name" href="#">Audi Q7</a>
				</div>
				
			</div>
		</div>
	</section>
	<div id="f">
    	<div class="container">
      	<div class="row">
      		<div class="col-lg-3"></div>
        	<a class="col-lg-1" href="https://www.vk.com/"><div class="fa fa-vk"></div></a>
        	<a class="col-lg-1" href="https://www.facebook.com/"><div class="fa fa-facebook"></div></a>
        	<a class="col-lg-1" href="https://www.youtube.com/"><div class="fa fa-youtube"></div></a>
        	<a class="col-lg-1" href="https://www.instagram.com/"><div class="fa fa-instagram"></div></a>
      		<div class="col-lg-3"></div>
      	</div>
    	</div>
    </div>

</body>
</html>