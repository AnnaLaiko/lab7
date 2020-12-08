<?php
session_start();

if(!isset($_SESSION['user'])||$_SESSION['user']['rank']<2)
{
    header('Location: index.php');
}
require_once 'connect.php';
if(isset($_POST['delete']))
{
    if (is_array($_POST))
    {
        foreach ($_POST as $key => $value)
        {
            if ($value == 'on')
            {
                $key=intval($key);
                mysqli_query($connect, "DELETE FROM cars WHERE id='$key'");
            }
        }
        header('Location: /mysite/crud_2.php');
    }
}
else if(isset($_POST['edit']))
{
    $id=intval($_POST['edit']);
    $user_id=intval($_POST['car_owner']);
    $model=mysqli_real_escape_string($connect,$_POST['model'.$id]);
    $price=intval($_POST['price'.$id]);
    $year=intval($_POST['year'.$id]);
    mysqli_query($connect,"UPDATE `cars` SET `user_id` = '$user_id', `car` = '$model', `price` = '$price', `year` = '$year' WHERE `cars`.`id` = '$id'");
    header('Location: /mysite/crud_2.php');
}
else
    header('Location: /mysite/crud_2.php');
?>