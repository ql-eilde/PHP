<?php
class Vector
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 0.0;
	public static $verbose = False;

	function doc() { return (file_get_contents("./Vector.class.txt")); }

	function getX() { return ($this->_x); }

	function getY() { return ($this->_y); }

	function getZ() { return ($this->_z); }

	function getW() { return ($this->_w); }

	function __construct (array $kwargs)
	{
		$orig = (array)($kwargs['orig']);
		$i = 0;
		foreach ($orig as $key => $val)
		{
			$tab[$i] = $val;
			$i++;
		}
		$orig_x = $tab[0];
		$orig_y = $tab[1];
		$orig_z = $tab[2];
		$orig_w = $tab[3];
		$dest = (array)($kwargs['dest']);
		$i = 0;
		foreach ($dest as $key => $val)
		{
			$tab[$i] = $val;
			$i++;
		}
		$dest_x = $tab[0];
		$dest_y = $tab[1];
		$dest_z = $tab[2];
		$dest_w = $tab[3];
		if ($dest_x > 0)
			$this->_x = (abs($orig_x) + abs($dest_x));
		else if ($dest_x < 0)
			$this->_x = -(abs($orig_x) + abs($dest_x));
		if ($dest_y > 0)
			$this->_y = (abs($orig_y) + abs($dest_y));
		else if ($dest_y < 0)
			$this->_y = -(abs($orig_y) + abs($dest_y));
		if ($dest_z > 0)
			$this->_z = (abs($orig_z) + abs($dest_z));
		else if ($dest_z < 0)
			$this->_z = -(abs($orig_z) + abs($dest_z));
		if (self::$verbose === True)
			print('Vector( x: '.number_format($this->getX(),2).', y: '.number_format($this->getY(),2).', z: '.number_format($this->getZ(),2).', w: '.number_format($this->getW(),2).' ) constructed'.PHP_EOL);
		return ;
	}

	function __destruct()
	{
		if (self::$verbose === True)
			print('Vector( x: '.number_format($this->getX(),2).', y: '.number_format($this->getY(),2).', z: '.number_format($this->getZ(),2).', w: '.number_format($this->getW(),2).' ) destructed'.PHP_EOL);
		return ;
	}

	function __toString()
	{
		return ('Vector( x: '.number_format($this->getX(),2).', y: '.number_format($this->getY(),2).', z: '.number_format($this->getZ(),2).', w: '.number_format($this->getW(),2).' )');
	}
}
/*
require_once 'Vertex.class.php';
require_once 'Color.class.php';

Vertex::$verbose = False;
Vector::$verbose = True;

$vtxO = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 0.0 ) );
$vtxX = new Vertex( array( 'x' => 1.0, 'y' => 0.0, 'z' => 0.0 ) );
$vtxY = new Vertex( array( 'x' => 0.0, 'y' => 1.0, 'z' => 0.0 ) );
$vtxZ = new Vertex( array( 'x' => 0.0, 'y' => 0.0, 'z' => 1.0 ) );

$vtcXunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxX ) );
$vtcYunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxY ) );
$vtcZunit = new Vector( array( 'orig' => $vtxO, 'dest' => $vtxZ ) );

$dest1 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
Vertex::$verbose = True;
$vtc1  = new Vector( array( 'dest' => $dest1 ) );
Vertex::$verbose = False;

$orig2 = new Vertex( array( 'x' => 23.87, 'y' => -37.95, 'z' => 78.34 ) );
$dest2 = new Vertex( array( 'x' => -12.34, 'y' => 23.45, 'z' => -34.56 ) );
$vtc2  = new Vector( array( 'orig' => $orig2, 'dest' => $dest2 ) );
 */
?>
