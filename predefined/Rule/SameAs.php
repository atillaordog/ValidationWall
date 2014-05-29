<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class SameAs extends Rule
{
	private $_match_field = null;
	
	public function __construct($match_field)
	{
		$this->_match_field = $match_field;
	}
	
	public function validate($field, Array $data = array())
	{
		$this->_error_message = 'The two values must match.';
		
		// Only check if available
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		if ( !array_key_exists($this->_match_field, $data) )
		{
			return false;
		}
		
		$this->_variable = $data[$field];
		
		return $this->_variable == $data[$this->_match_field];
	}
}
