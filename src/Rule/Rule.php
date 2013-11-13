<?php

namespace ValidationWall\Rule;

use ValidationWall\Rule\RuleInterface as RuleInterface;

abstract class Rule implements RuleInterface
{
	protected $_variable;
	
	protected $_against;
	
	public $_error_message;
	
	abstract public function validate($field, Array $data);
}