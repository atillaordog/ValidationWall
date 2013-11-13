<?php
//namespace ValidationWall;

/** 
 * Validation Wall
 */
class ValidationWall
{
	private $_data = array();
	
	private $_door;
	
	public function __construct(ValidationWall\Door\DoorInterface $door)
	{
		$this->_door = $door;
	}
	
	public function pass(Array $data = array())
	{
		return $this->_door->pass($data);
	}
	
}