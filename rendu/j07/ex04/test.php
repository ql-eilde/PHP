<?php

include_once('Lannister.class.php');
include_once('Jaime.class.php');
include_once('Tyrion.class.php');

class Stark {
}

class Cersei extends Lannister {
}

class Sansa extends Stark {
}

$j = new Jaime();
$c = new Cersei();
$t = new Tyrion();
$s = new Sansa();

$j->sleepWith($t);  //jaime + tyrion
$j->sleepWith($s);	//jaime + sansa
$j->sleepWith($c);	//jaime + Cersei

$t->sleepWith($j);	//Tyrion + Jaime
$t->sleepWith($s);	//Tyrion + Sansa
$t->sleepWith($c);	//Tyrion + Cersei

?>
