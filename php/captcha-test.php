<?php

if(!isset($_POST['captcha'])||!isset($_COOKIE['captcha']))
{
	die;
}
else
{
	$captcha_cook=$_COOKIE['captcha'];
	$captcha_post=$_POST['captcha'];
	$captcha_post_md5=md5(md5($captcha_post.$captcha_post).$captcha_post);
	if($captcha_post_md5!=$captcha_cook)
	{
		echo 'ИЗЫДИ';
	}
	else
	{
		echo 'ВОЙДИ';
	}
}