<?php 
  session_start();
  require_once 'php/connect.php';
  $check_drivers=mysqli_query($connect, "SELECT * FROM drivers LIMIT 8");
  if(isset($_SESSION['user']))
  {
    $check_phone_numbers=mysqli_query($connect, "SELECT * FROM phones LIMIT 8");
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Наши водители</title>
  <!--Ссылка для бутстрапа-->
  <?php echo file_get_contents('html/head.html'); ?>
</head>
<body class="drive_body">
  <?php require_once 'php/head.php';?>
  <div class="have">Наши водители:</div>
  <section id="driver">
      <?php if(!isset($_SESSION['user']))
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

  <?php echo file_get_contents('html/about.html'); ?>
</body>
</html>