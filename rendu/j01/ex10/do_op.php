#!/usr/bin/php
<?php
if ($argc == 1)
	echo "Incorrect Parameters\n";
else
{
	if (strstr(trim($argv[2]), "+") != null)
		$res = trim($argv[1]) + trim($argv[3]);
	else if (strstr(trim($argv[2]), "-") != null)
		$res = trim($argv[1]) - trim($argv[3]);
	else if (strstr(trim($argv[2]), "/") != null)
		$res = trim($argv[1]) / trim($argv[3]);
	else if (strstr(trim($argv[2]), "%") != null)
		$res = trim($argv[1]) % trim($argv[3]);
	else
		$res = trim($argv[1]) * trim($argv[3]);
	print($res)."\n";
}
?>
