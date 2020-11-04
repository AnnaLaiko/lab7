<?php 
	session_start();
	require_once 'connect.php';
	$login=@$_POST['username'];
	$pass=@$_POST['password'] or die('pls go out');
	if($login!=''&&$pass!='')
	{	
		$pass=md5($pass);
		$check_user=mysqli_query($connect, "SELECT * FROM users WHERE Login='$login' and Password='$pass' ");
		if(mysqli_num_rows($check_user)>0)
		{
			$user=mysqli_fetch_assoc($check_user);
			$_SESSION['user']=[
				"id"=> $user['id'],
				"name" =>$user['FIO'],
				"email" => $user['Email'],
				"rank" =>$user['Rank']
			];
			header('Location: ../lk.php');
		}
		else
		{
			$_SESSION['message']='Неверный логин и/или пароль';
			header('Location: ../login.php');	
		}
	}
	else
	{
		$_SESSION['message']='Введите Логин и пароль';
		header('Location: ../login.php');
	}

 ?>