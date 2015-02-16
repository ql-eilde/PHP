#!/usr/bin/php
<?php
function ft_split($str)
{
	$my_tab = explode(" ", $str);
	sort($my_tab);
	while ($my_tab[0] == null)
		array_shift($my_tab);
	return $my_tab;
}
?>
