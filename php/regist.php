
<?php 
	session_start();
	require_once 'connect.php';

	$Login=@$_POST['login'] or die('pls go out');
	$Email=@$_POST['email'] or die('pls go out');
	$FIO=@$_POST['fio'] or die('pls go out');
	$Password=@$_POST['password'] or die('pls go out');
	$Password_accept=@$_POST['password_accept'] or die('pls go out');

	if($Password===$Password_accept)
	{
		if($Login!=''&&$Email!=''&&$FIO!=''&&$Password!=''&&$Password_accept!='')
		{
			$FIO=htmlentities($FIO);
			$FIO=stripslashes($FIO);
			$Email=stripslashes($Email);
			$Login=stripslashes($Login);
			$Password_accept=stripslashes($Password_accept);
			$Password=stripslashes($Password);
			$check_user=mysqli_query($connect, "SELECT * FROM users WHERE Login='$Login' or Email='$email'");
			
			if(mysqli_num_rows($check_user)==0)
			{
				$Password=md5($Password);
				mysqli_query($connect, "INSERT INTO `users` (`id`, `Login`, `Password`, `Email`, `FIO`) VALUES (NULL, '$Login', '$Password', '$Email', '$FIO')");
				$_SESSION['message']='Вы зарегистрированы!';
				header('Location: ../login.php');
			}
			else
			{
				$_SESSION['message']='Данная почта и/или логин заняты';
				header('Location: ../register.php');
			}
		}
		else
		{
			$_SESSION['message']='Заполните все поля';
			header('Location: ../register.php');
		}
	}
	else
	{
		$_SESSION['message']='Пароли не совпадают';
		header('Location: ../register.php');	
	}
?>
