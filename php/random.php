<?php
function generate_code ()
{
	$chars = 'ertypasdgkzxcvbm23456789';
	$length = rand(4, 6);
	$numChars = strlen($chars);
	$str = '';
	for ($i = 0; $i < $length; $i++)
	{
		$str .= $chars[rand(0,$numChars-1)];
	} // Генерируем код

	return $str;
}