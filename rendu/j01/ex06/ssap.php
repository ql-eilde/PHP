#!/usr/bin/php
<?php
if ($argc > 1)
{
	$i = 1;
	$final_table = $argv;
	while ($argv[$i] != null)
	{
		if (($sp = strstr($argv[$i], " ")) != null)
		{
			$my_tab = explode(" ", $argv[$i]);
			$my_tab = array_filter($my_tab);
			$final_table = array_merge($final_table, $my_tab);
		}
		$i++;
	}
	$i = 1;
	$tab = array();
	while ($final_table[$i] != null)
	{
		if (($str = strstr($final_table[$i], " ")) == null)
			array_unshift($tab, $final_table[$i]);
		$i++;
	}
	sort($tab);
	foreach ($tab as $value)
	{
		echo $value."\n";
	}
}
exit;
?>
