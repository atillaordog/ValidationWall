<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class Numeric extends Rule
{
	public function validate($field, Array $data = array())
	{
		$this->_error_message = ucfirst($field).' has to be a valid number.';
		
		// Only check if available
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		return is_numeric($this->_variable);
	}
}
