#!/usr/bin/php
<?php
if ($argc == 1 || $argc > 2)
	exit;
if (($content = file_get_contents($argv[1])) !== false)
	print($content);
exit;
?>
