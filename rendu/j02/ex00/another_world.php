#!/usr/bin/php
<?php
if ($argc > 1)
{
	preg_match_all("/[a-zA-Z0-9_]+/", $argv[1], $tab);
	foreach ($tab as $elem)
	{
		$str = implode(" ", $elem);
	}
	print($str)."\n";
}
exit;
?>
