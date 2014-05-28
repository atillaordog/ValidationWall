<?php

namespace ValidationWall\Door;

use ValidationWall\Door\DoorInterface as DoorInterface;
use Exception;

abstract class Door implements DoorInterface
{
	protected $_rulesets = array();
	
	protected $_pass = true;
	
	protected $_errors = array();
	
	public function __construct(Array $rulesets = array())
	{
		foreach ( $rulesets as $ruleset )
		{
			if ( !in_array('ValidationWall\RuleSet\RuleSetInterface', class_implements($ruleset)) )
			{
				throw new Exception('Not a valid rule');
			}
		}
		
		$this->_rulesets = $rulesets;
	}
	
	public function pass(Array $data = array())
	{
		foreach ( $this->_rulesets as $ruleset )
		{
			if ( !$ruleset->pass($data) )
			{
				$this->_pass = false;
				$ruleset_errors = $ruleset->getErrors();
				$this->_errors[$ruleset->getField()] = $ruleset_errors[$ruleset->getField()];
			}
		}
		
		return $this->_pass;
	}
	
	public function getErrors()
	{
		return $this->_errors;
	}
}
