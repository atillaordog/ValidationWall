<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class ExactLength extends Rule
{
	public function validate($field, Array $data = array(), $against = 0)
	{
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		if ( is_array($against) )
		{
			$against = array_filter($against, 'is_numeric');
			
			$this->_error_message = ucfirst($field).' must match one of the lengths.';
			
			foreach ($against as $strlen)
			{
				if (strlen($value) === (int)$strlen)
					return TRUE;
			}
			return FALSE;
		}
		
		$this->_error_message = ucfirst($field).' must be exactly '.(int)$against.' long.';
		
		return strlen($this->_variable) === (int)$against;
	}
}