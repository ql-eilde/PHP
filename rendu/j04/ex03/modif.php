<?php
if (!$_POST["login"] || !$_POST["oldpw"] || !$_POST["newpw"] || $_POST["submit"] !== "OK")
{
	echo "ERROR\n";
	exit;
}
$tab = unserialize(file_get_contents("../private/passwd"));
$login = $_POST["login"];
$oldpw = hash(whirlpool, $_POST["oldpw"]);
$newpw = hash(whirlpool, $_POST["newpw"]);
foreach ($tab as &$val)
{
	if ($val["login"] == $login && $val["passwd"] == $oldpw && $val["passwd"] != $newpw && $oldpw != $newpw)
	{
		$val["passwd"] = $newpw;
		$tab = serialize($tab);
		file_put_contents("../private/passwd", $tab);
		echo "OK\n";
		exit;
	}
}
echo "ERROR\n";
?>
