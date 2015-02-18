#!/usr/bin/php
<?php
if ($argc != 1)
	exit;
exec('who', $tab);
foreach ($tab as $elem)
	echo "$elem\n";
?>
