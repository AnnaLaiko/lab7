<?php

//['car_owner']
//['car_name']
//['car_price']
//['car_year']
//['add_date']

require_once 'connect.php';
if(isset($_POST['add_data']))
{
    $owner=mysqli_real_escape_string($connect,$_POST['car_owner']);
    $name=mysqli_real_escape_string($connect,$_POST['car_name']);
    $price=intval($_POST['car_price']);
    $year=intval($_POST['car_year']);
    mysqli_query($connect, "INSERT INTO `cars` (`id`, `user_id`, `car`, `price`, `year`) VALUES ('', '$owner', '$name', '$price', '$year')");
    header('Location: ../crud_2.php');
}
else
{
    header('Location: ../index.php');
}
?>