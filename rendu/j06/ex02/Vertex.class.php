<?php

require_once 'Color.class.php';

class Vertex
{
	private $_x = 0.00;
	private $_y = 0.00;
	private $_z = 0.00;
	private $_w = 1.00;
	private $_color;
	public static $verbose = False;

	function doc() { return (file_get_contents("./Vertex.class.txt")); }

	function getX() { return ($this->_x); }

	function getY() { return ($this->_y); }

	function getZ() { return ($this->_z); }

	function getW() { return ($this->_w); }

	function getColor() { return ($this->_color); }

	function setX($val_x) { return ($this->_x = $val_x); }

	function setY($val_y) { return ($this->_y = $val_y); }

	function setZ($val_z) { return ($this->_z = $val_z); }

	function setW($val_w) { return ($this->_w = $val_w); }

	function setColor($val_color) { return ($this->_color = $val_color); }

	function __construct(array $kwargs)
	{
		$this->_color = $this->setColor(new Color( array('red'=>255, 'green'=>255, 'blue'=>255)));
		if ($kwargs['x'] !== null)
			$this->_x = $this->setX(number_format(($kwargs['x']), 2));
		if ($kwargs['y'] !== null)
			$this->_y = $this->setY(number_format(($kwargs['y']), 2));
		if ($kwargs['z'] !== null)
			$this->_z = $this->setZ(number_format(($kwargs['z']), 2));
		if ($kwargs['w'])
			$this->_w = $this->setW(number_format(($kwargs['w']), 2));
		if ($kwargs['color'] !== null)
			$this->_color = $this->setColor($kwargs['color']);
		if (self::$verbose === True)
			print('Vertex( x: '.$this->getX().', y: '.$this->getY().', z: '.$this->getZ().', w: '.number_format(($this->getW()), 2).', '.$this->getColor().' ) constructed'.PHP_EOL);
		return ;
	}

	function __destruct()
	{
		if (self::$verbose === True)
			print('Vertex( x: '.$this->getX().', y: '.$this->getY().', z: '.$this->getZ().', w: '.number_format(($this->getW()), 2).', '.$this->getColor().' ) destructed'.PHP_EOL);
		return ;
	}

	function __toString()
	{
		if (self::$verbose === True)
			return ('Vertex( x: '.$this->getX().', y: '.$this->getY().', z: '.$this->getZ().', w: '.number_format(($this->getW()), 2).', '.$this->getColor());
		if (self::$verbose === False)
			return ('Vertex( x: '.$this->getX().', y: '.$this->getY().', z: '.$this->getZ().', w: '.number_format(($this->getW()), 2).' )');
	}
}
?>
