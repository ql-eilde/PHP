<?php
abstract Class Fighter
{
	abstract public function fight($att);

	public function __construct($val)
	{
		print(UnholyFactory::getTest());
		if (in_array($val, UnholyFactory::getTest(), true) == false)
		{
			UnholyFactory::setTest($val);	
			print('(Factory absorbed a fighter of type '.$val.')'.PHP_EOL);
		}
		else
			print('(Factory already absorbed a fighter of type '.$val.PHP_EOL);;
	}
}
?>