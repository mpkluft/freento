<?php 

Class Player
{
	private $name;

	private $town = '';

	public function __construct(string $name)
	{
		$this->name = $name;
	}

	public function setCity(string $town) : object
	{
		$this->town = ' (' . $town . ')';
		return $this;
	}

	public function getName() : string
	{	
		return $this->name . $this->town;
	}

}


?>