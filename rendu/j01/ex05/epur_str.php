#!/usr/bin/php
<?php
$var = trim($argv[1]);
while ($var[$i] != null)
{
	if ($var[$i] == " ")
	{
		$i++;
		if ($var[$i] == " ")
		{
			while ($var[$i] == " ")
			{
				$var[$i] = "";
				$i++;
			}
		}
	}
	$i++;
}
print($var)."\n";
?>
