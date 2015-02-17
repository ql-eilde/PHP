#!/usr/bin/php
<?php
if ($argc == 1)
	echo "Incorrect Parameters\n";
if ($argc > 1)
{
	if (strstr(trim($argv[1]), "+") != null)
	{
		$my_tab = explode("+", trim($argv[1]));
		if (is_numeric(trim($my_tab[0])) == false ||
			is_numeric(trim($my_tab[1])) == false)
		{
			echo "Syntax Error\n";
			exit;
		}
		$res = trim($my_tab[0]) + trim($my_tab[1]);
		print($res)."\n";
	}
	else if (strstr(trim($argv[1]), "-") != null)
	{
		$my_tab = explode("-", trim($argv[1]));
		if (is_numeric(trim($my_tab[0])) == false ||
			is_numeric(trim($my_tab[1])) == false)
		{
			echo "Syntax Error\n";
			exit;
		}
		$res = trim($my_tab[0]) - trim($my_tab[1]);
		print($res)."\n";
	}
	else if (strstr(trim($argv[1]), "/") != null)
	{
		$my_tab = explode("/", trim($argv[1]));
		if (is_numeric(trim($my_tab[0])) == false ||
			is_numeric(trim($my_tab[1])) == false)
		{
			echo "Syntax Error\n";
			exit;
		}
		$res = trim($my_tab[0]) / trim($my_tab[1]);
		print($res)."\n";
	}
	else if (strstr(trim($argv[1]), "%") != null)
	{
		$my_tab = explode("%", trim($argv[1]));
		if (is_numeric(trim($my_tab[0])) == false ||
			is_numeric(trim($my_tab[1])) == false)
		{
			echo "Syntax Error\n";
			exit;
		}
		$res = trim($my_tab[0]) % trim($my_tab[1]);
		print($res)."\n";
	}
	else if (strstr(trim($argv[1]), "*") != null)
	{
		$my_tab = explode("*", trim($argv[1]));
		if (is_numeric(trim($my_tab[0])) == false ||
			is_numeric(trim($my_tab[1])) == false)
		{
			echo "Syntax Error\n";
			exit;
		}
		$res = trim($my_tab[0]) * trim($my_tab[1]);
		print($res)."\n";
	}
	else
	{
		echo "Syntax Error\n";
		exit;
	}
}
?>
