<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\Rule as Rule;

class IP extends Rule
{
	public function validate($field, Array $data = array(), $against = false)
	{
		// Validate only if exists in incoming data
		if ( !array_key_exists($field, $data) )
		{
			return true;
		}
		
		$this->_variable = $data[$field];
		
		// In this case against is used to see if we can check for private networks
		$allow_private = (boolean)$against;
		
		// Do not allow reserved addresses
		$flags = FILTER_FLAG_NO_RES_RANGE;

		if ($allow_private === FALSE)
		{
			// Do not allow private or reserved addresses
			$flags = $flags | FILTER_FLAG_NO_PRIV_RANGE;
		}

		return (bool) filter_var($this->_variable, FILTER_VALIDATE_IP, $flags);
	}
}