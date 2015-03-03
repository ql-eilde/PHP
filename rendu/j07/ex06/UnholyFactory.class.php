<?php
Class UnholyFactory
{
	public $test = array();

	public function getTest()
	{
		return ($this->test);
	}

	public function setTest($val)
	{
		return (array_push($this->test, $val));
	}

	public function absorb($class)
	{
	}
}
?>