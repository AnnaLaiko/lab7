<?php 
  session_start();
  $connect_driver=mysqli_connect('localhost','root','','test');
  if(!$connect_driver){die('error connect to DB');}
  $check_drivers=mysqli_query($connect_driver, "SELECT * FROM drivers LIMIT 8");
  if(isset($_SESSION['user'])!=NULL)
  {
    $check_phone_numbers=mysqli_query($connect_driver, "SELECT * FROM phones LIMIT 8");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Наши водители</title>
  <!--Ссылка для бутстрапа-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>

  <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/main.css">
  <base target="_blank">
</head>
<body class="drive_body">
  <header class="header">
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
  <div class="have">Наши водители:</div>
  <section id="driver">
      <?php if(isset($_SESSION['user'])==NULL)
      while($drivers=mysqli_fetch_assoc($check_drivers))
      echo '<div class="container drivers">
          <div class="row drive">
        <div class="col-lg-2 dr">'
        . $drivers['id'] . 
        '</div>
        <div class="col-lg-5 dr"> '
        . $drivers['Name'] .
        '</div>
        <div class="col-lg-5 dr">'
        . $drivers['Experience'] . ' машин' . 
        '</div>
      </div>
    </div>';
    else
    {
      while($drivers=mysqli_fetch_assoc($check_drivers))
      {
        $phones=mysqli_fetch_assoc($check_phone_numbers);
      echo '<div class="container drivers">
          <div class="row drive">
        <div class="col-lg-2 dr">'
        . $drivers['id'] . 
        '</div>
        <div class="col-lg-3 dr"> '
        . $drivers['Name'] .
        '</div>
        <div class="col-lg-3 dr">'
        . $drivers['Experience'] . ' машин' . 
        '</div>
        <div class="col-lg-3 dr">'
        . $phones['phone_number'] .
        '</div>
      </div>
    </div>';
      }
    }
      ?>
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