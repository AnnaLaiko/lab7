<?php
define ( 'DOCUMENT_ROOT', dirname ( __FILE__ ) );
define("img_dir", DOCUMENT_ROOT."/captcha/img/");

include_once("random.php");
$captcha = generate_code();

$cookie=md5(md5($captcha.$captcha).$captcha); //защита от подмены кук

$cookie_time=time()+120;
setcookie('captcha',$cookie,$cookie_time);

function img_code($code)
{
	$linenum = rand(3, 7);
	$img_arr = array(
		'C:\xampp\htdocs\mysite\img\1.png',
		'C:\xampp\htdocs\mysite\img\2.png',
		'C:\xampp\htdocs\mysite\img\3.png',
		'C:\xampp\htdocs\mysite\img\4.png'
	);

	$font_arr=array(
		0=> array(
			'fname'=>'C:\xampp\htdocs\mysite\fonts\arial.ttf',
			'size'=>rand(20,30)
		),

	);
	$n = rand(0,sizeof($font_arr)-1);
	$img_fn = $img_arr[rand(0, sizeof($img_arr)-1)];
	$im = imagecreatefrompng ($img_fn);

	// Накладываем текст капчи
	$x = 0;
	for($i = 0; $i < strlen($code); $i++) {
		$x+=20;
		$letter=substr($code, $i, 1);
		$color = imagecolorallocate($im, rand(0, 150), rand(0, 100), rand(0, 150)); // Случайный цвет c изображения
		imagettftext ($im, $font_arr[$n]["size"], rand(0, 45), $x, rand(50, 55), $color, $font_arr[$n]["fname"], $letter);
	}


	// Возвращаем получившееся изображение
	ImagePNG ($im);
	ImageDestroy ($im);
}
img_code($captcha); // Выводим изображение

