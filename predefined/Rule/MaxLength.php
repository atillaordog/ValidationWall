<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class MaxLength extends Rule
{
	private $_length = 0;
	
	public function __construct($length = 0)
	{
		$this->_length = (int)$length;
	}
	
	public function validate($field, Array $data = array())
	{	
		$this->_error_message = ucfirst($field).' can be at most '.$this->_length.' long.';
		
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		return strlen($this->_variable) <= $this->_length;
	}
}
