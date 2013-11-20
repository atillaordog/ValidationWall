<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class MinLength extends Rule
{
	public function validate($field, Array $data = array(), $against = 0)
	{
		$against = (int)$against;
		
		$this->_error_message = ucfirst($field).' must be at least '.$against.' long.';
		
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		return strlen($this->_variable) >= $against;
	}
}