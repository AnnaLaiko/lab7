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
            if (($value == 'on')&&($key!=$_SESSION['user']['id']))
            //Мы не можем удалить сами себя
            {
                $key=intval($key);
                $check_delete=mysqli_query($connect, "SELECT Rank FROM `users` WHERE ID='$key'");
                //Проверяем ранг удаляемого пользователя
                if(mysqli_num_rows($check_delete)>0)
                {
                    $check_delete_data=mysqli_fetch_assoc($check_delete);
                    $rank=(int)($check_delete_data['Rank']);
                    $you_rank=(int)($_SESSION['user']['rank']);
                    if($you_rank>$rank)
                    //Если наш ранг выше, то удаляем
                    {
                        mysqli_query($connect, "DELETE FROM users WHERE ID='$key'");
                    }
                }
            }
        }
        header('Location: /mysite/crud.php');
    }
}
else if(isset($_POST['edit']))
{
    $id=intval($_POST['edit']);
    $email=mysqli_real_escape_string($connect,$_POST['email'.$id]);
    $fio=mysqli_real_escape_string($connect,$_POST['fio'.$id]);
    $rank=intval($_POST['rank'.$id]);
    mysqli_query($connect,"UPDATE `users` SET `Email` = '$email', `FIO` = '$fio', `Rank` = '$rank' WHERE `users`.`id` = '$id'");
    header('Location: /mysite/crud.php');
}
else
    header('Location: /mysite/crud.php');
?>