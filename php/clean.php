<?php
mb_regex_encoding('UTF-8');
mb_internal_encoding("UTF-8");
$list_bad_word=file_get_contents('../swear/bads.txt');
$mass_bad_word=preg_split('/[\ \n\,.;!?"]+/', $list_bad_word); 
function clear($str, $mass_bad_word)
{
	mb_regex_encoding('UTF-8');
	mb_internal_encoding("UTF-8");
		foreach($mass_bad_word as $bad)
		{
				$word='/\b'. $bad . '\b/ui';
				$str=preg_replace($word, stars($bad), $str);
		}
	return($str);
}
function add($word)
{
	file_put_contents('../swear/bads.txt', ' '.$word,FILE_APPEND);
}
function check_swear($word, $mass_bad_word)
{
	foreach ($mass_bad_word as $bad) {
		$bad_reg='/\b'.$bad.'\b/ui';
		if(preg_match($bad_reg, $word)) return true;
	}
	return false;
}
function stars($word)
{
	$str=preg_replace('/[a-z|а-я]/ui','*', $word);
	return $str;
}
?>