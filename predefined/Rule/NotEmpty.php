<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class NotEmpty extends Rule
{
	public function validate($field, Array $data = array())
	{
		$this->_error_message = ucfirst($field).' cannot be empty.';
		
		if ( !array_key_exists($field, $data) )
		{
			return false;
		}
		
		$this->_variable = $data[$field];
		
		if (is_object($this->_variable) AND $this->_variable instanceof ArrayObject)
		{
			// Get the array from the ArrayObject
			$this->_variable = $this->_variable->getArrayCopy();
		}

		// Value cannot be NULL, FALSE, '', or an empty array
		return ! in_array($this->_variable, array(NULL, FALSE, '', array()), TRUE);
	}
}