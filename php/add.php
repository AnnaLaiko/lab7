<?php 
	session_start();
	require_once 'clean.php';
	$text=@$_POST['text'] or die('pls go out');
	unset($_POST['text']);
	if($text!='')
	{	
		$accept=0;
		$repeat=0;
		$mas_words=preg_split('/[\ \n\,.;!?"]+/', $text);
		foreach ($mas_words as $word) {
			if(!check_swear($word, $mass_bad_word))
			{	add($word);
				$list_bad_word=file_get_contents('../swear/bads.txt');
				$mass_bad_word=preg_split('/[\ \n\,.;!?"]+/', $list_bad_word);
				$accept++;
			}
			else
				$repeat++;
		}
		$_SESSION['Accept']=$accept;
		$_SESSION['Repeat']=$repeat;
		header('Location: ../swear_add.php');
	}
	else
	{
		$_SESSION['message']='Введите сообщение';
		header('Location: ../swear_add.php');
	}

 ?>