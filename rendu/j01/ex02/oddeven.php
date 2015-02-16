#!/usr/bin/php
<?php
$prompt = "Entrez un nombre: ";

function parity($nombre)
{
	if ($nombre % 2 == 0)
		return "Pair";
	else
		return "Impair";
}

while(42)
{
	print $prompt;
	if (feof(STDIN) == true)
		break ;
	$val = trim(fgets(STDIN));
	if (is_numeric($val) == true)
	{
		$ret = parity($val);
		print "Le chiffre $val est $ret\n";
	}
	else
		print "'$val' n'est pas un chiffre\n";
}
?>
