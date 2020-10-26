<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Модельный ряд</title>
	<!--Ссылка для бутстрапа-->
	<?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="models_body">
  <?php require_once 'php/head.php';?>
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
	<?php echo file_get_contents('html/about.html'); ?>

</body>
</html>