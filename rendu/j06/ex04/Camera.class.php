<?php
class Camera
{
	private $_origin = null;
	private $_width = null;
	private $_height = null;
	private $tT = null;
	private $tR = null;
	private $_mult = null;
	public static $verbose = False;

	public function doc() { return (file_get_contents("./Camera.class.txt")); }

	public function watchVertex(Vertex $worldVertex)
	{
		$i = (($worldVertex->getX() - (-1))/2.0) * $this->_width;
		$j = (($worldVertex->getY() - (-1))/2.0) * $this->_height;
		return (new Vertex(array('x'=>$i,'y'=>$j,'z'=>0)));
	}

	public function __construct (array $kwargs)
	{
		$this->_origin = $kwargs['origin'];
		$this->_width = $kwargs['width'];
		$this->_height = $kwargs['height'];
		$vtc = new Vector(array('dest' => $this->_origin));
		$oppv = $vtc->opposite();
		$this->_tT = new Matrix(array('preset'=>Matrix::TRANSLATION, 'vtc' => $oppv));
		$this->_tR = $kwargs['orientation'];
		$this->_mult = $this->_tR->mult($this->_tT);
		$ratio = $kwargs['width'] / $kwargs['height'];
		$this->_mult->projection($kwargs['fov'], $ratio, $kwargs['near'], $kwargs['far']);
		if (self::$verbose === True)
			print('Camera instance constructed'.PHP_EOL);
		return ;
	}

	public function __destruct()
	{
		if (self::$verbose === True)
			print('Camera instance destructed'.PHP_EOL);
		return ;
	}

	public function __toString()
	{
		return ('Camera('."\n".'+ Origine: '.$this->_origin."\n".'+ tT:'."\n".$this->_tT."\n".'+ tR:'."\n".$this->_tR."\n".'+ tR->mult( tT ):'."\n".$this->_mult."\n".'+ Proj:'."\n".$this->_mult);
	}
}
?>
