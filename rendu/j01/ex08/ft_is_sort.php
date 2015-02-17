#!/usr/bin/php
<?php
function ft_is_sort($table)
{
	$i = 0;
	$sorted = $table;
	sort($sorted);
	while ($table[$i] != null && $sorted[$i] != null)
	{
		if (strcmp($table[$i], $sorted[$i]) != 0)
			return false;
		$i++;
	}
	return true;
}
?>
