<?php
session_start();
require_once 'connect.php';


$Login = @$_POST['login'] or header('Location: ../register.php');
$Email = @$_POST['email'] or header('Location: ../register.php');
$FIO = @$_POST['fio'] or header('Location: ../register.php');
$Password = @$_POST['password'] or header('Location: ../register.php');
$Password_accept = @$_POST['password_accept'] or header('Location: ../register.php');

if (isset($_POST['captcha'])&&isset($_COOKIE['captcha'])) {
	$captcha_cook = $_COOKIE['captcha'];
	$captcha_post = $_POST['captcha'];
	$captcha_post_md5 = md5(md5($captcha_post . $captcha_post) . $captcha_post);
	if ($captcha_post_md5 == $captcha_cook) {
		if ($Password === $Password_accept) {
			if ($Login != '' && $Email != '' && $FIO != '' && $Password != '' && $Password_accept != '') {
				$FIO = htmlentities($FIO);
				$FIO = stripslashes($FIO);
				$Email = stripslashes($Email);
				$Login = stripslashes($Login);
				$Password_accept = stripslashes($Password_accept);
				$Password = stripslashes($Password);
				$check_user = mysqli_query($connect, "SELECT * FROM users WHERE Login='$Login' or Email='$email'");

				if (mysqli_num_rows($check_user) == 0) {
					$Password = md5($Password);
					mysqli_query($connect, "INSERT INTO `users` (`id`, `Login`, `Password`, `Email`, `FIO`) VALUES (NULL, '$Login', '$Password', '$Email', '$FIO')");
					$_SESSION['message'] = 'Вы зарегистрированы!';
					header('Location: ../login.php');
				} else {
					$_SESSION['message'] = 'Данная почта и/или логин заняты';
					header('Location: ../register.php');
				}
			} else {
				$_SESSION['message'] = 'Заполните все поля';
				header('Location: ../register.php');
			}
		} else {
			$_SESSION['message'] = 'Пароли не совпадают';
			header('Location: ../register.php');
		}
	}
}
//$_SESSION['message'] = 'Введите правильно капчу';
//header('Location: ../register.php');
?>
