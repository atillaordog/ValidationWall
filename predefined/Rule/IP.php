<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class IP extends Rule
{
	private $_allow_private = false;
	
	public function __construct($allow_private = false)
	{
		$this->_allow_private = $allow_private;
	}
	
	public function validate($field, Array $data = array())
	{
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		// Do not allow reserved addresses
		$flags = FILTER_FLAG_NO_RES_RANGE;

		if ($this->_allow_private === FALSE)
		{
			// Do not allow private or reserved addresses
			$flags = $flags | FILTER_FLAG_NO_PRIV_RANGE;
		}

		return (bool) filter_var($this->_variable, FILTER_VALIDATE_IP, $flags);
	}
}
