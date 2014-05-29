<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class ExactLength extends Rule
{
	private $_length = null;
	
	public function __construct($length = 0)
	{
		$this->_length = $length;
	}
	
	public function validate($field, Array $data = array())
	{
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		if ( is_array($this->_length) )
		{
			$this->_length = array_filter($this->_length, 'is_numeric');
			
			$this->_error_message = ucfirst($field).' must match one of the lengths.';
			
			foreach ($this->_length as $strlen)
			{
				if (strlen($value) === (int)$strlen)
					return TRUE;
			}
			return FALSE;
		}
		
		$this->_error_message = ucfirst($field).' must be exactly '.(int)$this->_length.' long.';
		
		return strlen($this->_variable) === (int)$this->_length;
	}
}
