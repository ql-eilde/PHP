#!/usr/bin/php
<?php
date_default_timezone_set('Europe/Paris');
if ($argc == 1)
	exit;
$first = "/^";
$last = "$/";
$space = "\040";
$day = "([lL]undi|[mM]ardi|[mM]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi
		|[dD]imanche)";
$day_number = "([0][1-9]\040|[1-9]\040|[1-3][0-9]\040)";
$month = "([jJ]anvier|[fF]evrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet
	|[aA]out|[sS]eptembre|[oO]ctobre|[nN]ovembre|[dD]ecembre)";
$year = "([0-9]{4})";
$colon = ":";
$hours = "([0-2][0-9])";
$minutes = "([0-5][0-9])";
$seconds = "([0-5][0-9])";
preg_match($first.$day.$space.$day_number.$month.$space.$year.$space.$hours.
	$colon.$minutes.$colon.$seconds.$last, $argv[1], $tab);
$tab_day_number = explode(" ", $tab[2]);
if ($tab_day_number[0] < 1 || $tab_day_number[0] > 31 || $tab[5] > 23)
{
	echo "Wrong Format\n";
	exit;
}
if ($tab[3] == "janvier" || $tab[3] == "Janvier")
	$month_number = 01;
else if ($tab[3] == "fevrier" || $tab[3] == "Fevrier")
	$month_number = 02;
else if ($tab[3] == "mars" || $tab[3] == "Mars")
	$month_number = 03;
else if ($tab[3] == "avril" || $tab[3] == "Avril")
	$month_number = 04;
else if ($tab[3] == "mai" || $tab[3] == "Mai")
	$month_number = 05;
else if ($tab[3] == "juin" || $tab[3] == "Juin")
	$month_number = 06;
else if ($tab[3] == "juillet" || $tab[3] == "Juillet")
	$month_number = 07;
else if ($tab[3] == "aout" || $tab[3] == "Aout")
	$month_number = 08;
else if ($tab[3] == "septembre" || $tab[3] == "Septembre")
	$month_number = 09;
else if ($tab[3] == "octobre" || $tab[3] == "Octobre")
	$month_number = 10;
else if ($tab[3] == "novembre" || $tab[3] == "Novembre")
	$month_number = 11;
else if ($tab[3] == "decembre" || $tab[3] == "Decembre")
	$month_number = 12;
if (checkdate($month_number, $tab_day_number[0], $tab[4]) == true)
{
	$var = date("U", mktime($tab[5], $tab[6], $tab[7], $month_number,
		$tab_day_number[0], $tab[4]));
	print($var)."\n";
}
exit;
?>
