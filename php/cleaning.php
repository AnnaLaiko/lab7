<?php 
	session_start();
	require_once 'clean.php';
	$text=@$_POST['text'] or die('pls go out');
	unset($_POST['text']);
	if($text!='')
	{	
		$text=clear($text, $mass_bad_word);
		$_SESSION['message']=$text;
		header('Location: ../review.php');
	}
	else
	{
		$_SESSION['message']='Введите сообщение';
		header('Location: ../review.php');
	}

 ?>