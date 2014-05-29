<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class IsArray extends Rule
{
	public function validate($field, Array $data = array())
	{
		$this->_error_message = ucfirst($field).' is not an array.';
		
		if ( !array_key_exists($field, $data) )
		{
			return false;
		}
		
		$this->_variable = $data[$field];

		// Value cannot be NULL, FALSE, '', or an empty array
		return is_array($data[$field]);
	}
}
