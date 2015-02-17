#!/usr/bin/php
<?php
if ($argc > 1)
{
	$my_tab = explode(" ", $argv[1]);
	$my_tab = array_filter($my_tab);
	$reversed = array_reverse($my_tab);
	$reversed = implode(" ", $reversed);
	print($reversed)."\n";
}
exit;
?>
