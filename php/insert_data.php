
<?php 
	session_start();
	require_once 'connect.php';
	if(isset($_POST['add_data']))
	{
		$login=mysqli_real_escape_string($connect,$_POST['login']);
		$email=mysqli_real_escape_string($connect,$_POST['email']);
		$fio=mysqli_real_escape_string($connect,$_POST['fio']);
		$fio=strip_tags($fio);
		$password=mysqli_real_escape_string($connect,$_POST['password']);
		$rank=intval($_POST['rank']);
		$check_user=mysqli_query($connect, "SELECT * FROM users WHERE Login='$login' or Email='$email'");
		if(!mysqli_num_rows($check_user))
		{
			$password=md5($password);
			mysqli_query($connect, "INSERT INTO `users` (`id`, `Login`, `Password`, `Email`, `FIO`, `Rank`) VALUES (NULL, '$login', '$password', '$email', '$fio', '$rank')");
			header('Location: ../crud.php');
		}
		else
		{
			header('Location: ../crud.php');
		}
	}
	else
	{
		header('Location: ../index.php');
	}
?>
