<?php
class Vector
{
	private $_x = 0.0;
	private $_y = 0.0;
	private $_z = 0.0;
	private $_w = 1.0;
	public static $verbose = False;

	function doc() { return (file_get_contents("./Vector.class.txt")); }

	function getX() { return ($this->_x); }

	function getY() { return ($this->_y); }

	function getZ() { return ($this->_z); }

	function getW() { return ($this->_w); }

	function magnitude()
	{
		return (sqrt(pow($this->getX(), 2) + pow($this->getY(), 2) + pow($this->getZ(), 2)));
	}

	function normalize()
	{
		$magni = $this->magnitude();
		if ($magni == 1)
		{
			$tab['x'] = $this->getX();
			$tab['y'] = $this->getY();
			$tab['z'] = $this->getZ();
			$tab['w'] = $this->getW();
			return (new Vector(array('dest' => $tab)));
		}
		$x = (($this->getX()) / $magni);
		$y = (($this->getY()) / $magni);
		$z = (($this->getZ()) / $magni);
		$tab['x'] = $x;
		$tab['y'] = $y;
		$tab['z'] = $z;
		$tab['w'] = 0;
		return (new Vector(array('dest'=> $tab)));
	}

	function add($rhs)
	{
		$tab = get_object_vars($rhs);
		return (new Vector(array('orig' => $this, 'dest' => $tab)));
	}

	function sub($rhs)
	{
		$tab = get_object_vars($rhs);
		if ($tab['_x'] < 0)
			$new['x'] = (abs($tab['_x']) - abs($this->getX()));
		if ($tab['_x'] > 0)
			$new['x'] = -(abs($tab['_x']) - abs($this->getX()));
		if ($tab['_y'] < 0)
			$new['y'] = (abs($tab['_y']) - abs($this->getY()));
		if ($tab['_y'] > 0)
			$new['y'] = -(abs($tab['_y']) - abs($this->getY()));
		if ($tab['_z'] < 0)
			$new['z'] = (abs($tab['_z']) - abs($this->getZ()));
		if ($tab['_z'] > 0)
			$new['z'] = -(abs($tab['_z']) - abs($this->getZ()));
		$new['w'] = 0;
		return (new Vector(array('dest' => $new)));
	}

	function opposite()
	{
		if ($this->getX() < 0)
			$tab['x'] = abs($this->getX());
		if ($this->getX() > 0)
			$tab['x'] = -($this->getX());
		if ($this->getY() < 0)
			$tab['y'] = abs($this->getY());
		if ($this->getY() > 0)
			$tab['y'] = -($this->getY());
		if ($this->getZ() < 0)
			$tab['z'] = abs($this->getZ());
		if ($this->getZ() > 0)
			$tab['z'] = -($this->getZ());
		$tab['w'] = 0;
		return (new Vector(array('dest' => $tab)));
	}

	function scalarProduct($k)
	{
		$tab['x'] = ($this->getX() * $k);
		$tab['y'] = ($this->getY() * $k);
		$tab['z'] = ($this->getZ() * $k);
		$tab['w'] = 0;
		return (new Vector(array('dest' => $tab)));
	}

	function dotProduct($rhs)
	{
		$tab = get_object_vars($rhs);
		$x = ($this->getX() * $tab['_x']);
		$y = ($this->getY() * $tab['_y']);
		$z = ($this->getZ() * $tab['_z']);
		return ($x + $y + $z);
	}

	function cos($rhs)
	{
		$tab = get_object_vars($rhs);
		$cos = (($this->dotProduct($rhs)) / sqrt((pow($this->getX(),2) + pow($this->getY(),2) + pow($this->getZ(),2)) * (pow($tab['_x'],2) + pow($tab['_y'],2) + pow($tab['_z'],2))));
		return ($cos);
	}

	function crossProduct($rhs)
	{
		$tab = get_object_vars($rhs);
		$yz = ($this->getY() * $tab['_z']);
		$zy = ($this->getZ() * $tab['_y']);
		$zx = ($this->getZ() * $tab['_x']);
		$xz = ($this->getX() * $tab['_z']);
		$xy = ($this->getX() * $tab['_y']);
		$yx = ($this->getY() * $tab['_x']);
		$new['x'] = ($yz - $zy);
		$new['y'] = ($zx - $xz);
		$new['z'] = ($xy - $yx);
		$new['w'] = 0;
		return (new Vector(array('dest' => $new)));
	}

	function __construct (array $kwargs)
	{
		if ($kwargs['orig'] === null)
			$kwargs['orig'] = new Vertex(array('x'=>0.0,'y'=>0.0,'z'=>0.0,'w'=>1.0));
		else
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
		}
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
?>
