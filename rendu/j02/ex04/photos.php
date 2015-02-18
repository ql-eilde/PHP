#!/usr/bin/php
<?php
$tab = explode("//", $argv[1]);
$tab2 = explode("/", $tab[1]);
$mkdir = "mkdir ";
exec($mkdir.$tab2[0]);
$read = file_get_contents($argv[1]);
preg_match_all("/<img\040.*\040/", $read, $matches);
preg_match("/http.*[gif|jpg|jpeg|png]/", $matches[0][0], $img);
print_r($img);
$img2 = file_get_contents($img[0]);

?>
