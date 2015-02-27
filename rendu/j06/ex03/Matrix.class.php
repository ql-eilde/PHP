<?php
class Matrix
{
	const IDENTITY = "IDENTITY";
	const SCALE = "SCALE";
	const RX = "Ox ROTATION";
	const RY = "Oy ROTATION";
	const RZ = "Oz ROTATION";
	const TRANSLATION = "TRANSLATION";
	const PROJECTION = "PROJECTION";
	private $_vtcX;
	private $_vtcY;
	private $_vtcZ;
	private $_vtx0;
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 0;
	public static $verbose = False;

	public function doc() { return (file_get_contents("./Matrix.class.txt")); }

	public function getX() { return ($this->_x); }

	public function getY() { return ($this->_y); }

	public function getZ() { return ($this->_z); }

	public function getW() { return ($this->_w); }

	public function getVtcX($att) { return ($this->_vtcX[$att]); }

	public function getVtcY($att) { return ($this->_vtcY[$att]); }

	public function getVtcZ($att) { return ($this->_vtcZ[$att]); }

	public function getVtx0($att) { return ($this->_vtx0[$att]); }

	public function identity()
	{
		$this->_vtcX['x'] = $this->getX() + 1;
		$this->_vtcX['y'] = $this->getY();
		$this->_vtcX['z'] = $this->getZ();
		$this->_vtcX['w'] = $this->getW();
		$this->_vtcY['x'] = $this->getX();
		$this->_vtcY['y'] = $this->getY() + 1;
		$this->_vtcY['z'] = $this->getZ();
		$this->_vtcY['w'] = $this->getW();
		$this->_vtcZ['x'] = $this->getX();
		$this->_vtcZ['y'] = $this->getY();
		$this->_vtcZ['z'] = $this->getZ() + 1;
		$this->_vtcZ['w'] = $this->getW();
		$this->_vtx0['x'] = $this->getX();
		$this->_vtx0['y'] = $this->getY();
		$this->_vtx0['z'] = $this->getZ();
		$this->_vtx0['w'] = $this->getW() + 1;
	}

	public function translation(array $trans)
	{
		$tab = (array)$trans['vtc'];
		$i = 0;
		foreach($tab as $key => $value)
		{
			$new[$i] = $value;
			$i++;
		}
		$this->identity();
		$this->_vtx0['x'] = $new[0];
		$this->_vtx0['y'] = $new[1];
		$this->_vtx0['z'] = $new[2];
	}

	public function scale($scale)
	{
		$this->identity();
		$this->_vtcX['x'] = $this->getVtcX('x') * $scale;
		$this->_vtcY['y'] = $this->getVtcY('y') * $scale;
		$this->_vtcZ['z'] = $this->getVtcZ('z') * $scale;
	}

	public function rx($angle)
	{
		$this->identity();
		$this->_vtcY['y'] = cos($angle);
		$this->_vtcY['z'] = sin($angle);
		$this->_vtcZ['y'] = -sin($angle);
		$this->_vtcZ['z'] = cos($angle);
	}

	public function ry($angle)
	{
		$this->identity();
		$this->_vtcX['x'] = cos($angle);
		$this->_vtcX['z'] = -sin($angle);
		$this->_vtcZ['x'] = sin($angle);
		$this->_vtcZ['z'] = cos($angle);
	}

	public function rz($angle)
	{
		$this->identity();
		$this->_vtcX['x'] = cos($angle);
		$this->_vtcX['y'] = sin($angle);
		$this->_vtcY['x'] = -sin($angle);
		$this->_vtcY['y'] = cos($angle);
	}

	public function projection($rhs)
	{
		$this->identity();
		$this->_vtcX['x'] = (1 / 640);
		$this->_vtcY['y'] = (1 / 480);
		$this->_vtcZ['z'] = -(2 / (($rhs['far']) - ($rhs['near'])));
		$this->_vtx0['z'] = -(($rhs['far']) + ($rhs['near']) / (($rhs['far']) - ($rhs['near'])));
	}

	public function __construct(array $kwargs)
	{
		if ($kwargs['preset'] === self::IDENTITY)
			$this->identity();
		if ($kwargs['preset'] === self::TRANSLATION)
			$this->translation($kwargs);
		if ($kwargs['preset'] === self::SCALE)
			$this->scale($kwargs['scale']);
		if ($kwargs['preset'] === self::RX)
			$this->rx($kwargs['angle']);
		if ($kwargs['preset'] === self::RY)
			$this->ry($kwargs['angle']);
		if ($kwargs['preset'] === self::RZ)
			$this->rz($kwargs['angle']);
		if ($kwargs['preset'] === self::PROJECTION)
			$this->projection($kwargs);
		if (self::$verbose === True)
			print('Matrix '.$kwargs['preset'].' instance constructed'.PHP_EOL);
		return;
	}

	public function __destruct()
	{
		if (self::$verbose === True)
			print('Matrix instance destructed'.PHP_EOL);
		return;
	}

	public function __toString()
	{
		return
			('M | vtcX | vtcY | vtcZ | vtx0'."\n".'-----------------------------'."\n".'x | '
				.number_format($this->getVtcX('x'),2).' | '.number_format($this->getVtcY('x'),2).' | '
				.number_format($this->getVtcZ('x'),2).' | '.number_format($this->getVtx0('x'),2)."\n"
				.'y | '
				.number_format($this->getVtcX('y'),2).' | '.number_format($this->getVtcY('y'),2).' | '
				.number_format($this->getVtcZ('y'),2).' | '.number_format($this->getVtx0('y'),2)."\n"
				.'z | '
				.number_format($this->getVtcX('z'),2).' | '.number_format($this->getVtcY('z'),2).' | '
				.number_format($this->getVtcZ('z'),2).' | '.number_format($this->getVtx0('z'),2)."\n"
				.'w | '
				.number_format($this->getVtcX('w'),2).' | '.number_format($this->getVtcY('w'),2).' | '
				.number_format($this->getVtcZ('w'),2).' | '.number_format($this->getVtx0('w'),2));
	}
}
?>
