<?php
class Color
{
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = false;

	static function doc()
	{
		return (file_get_contents("./Color.class.txt"));
	}

	function __construct(array $kwargs)
	{
		foreach ($kwargs as $key => $val)
			$val = intval($val);
	}

	function __destruct()
	{
		return ;
	}

	function __toString()
	{
		return ;
	}
}
?>
