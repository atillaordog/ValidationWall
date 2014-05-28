<?php

namespace ValidationWall\RuleSet;

use ValidationWall\RuleSet\RuleSetInterface as RuleSetInterface;
use Exception;

abstract class RuleSet implements RuleSetInterface
{
	protected $_field = '';
	
	protected $_rules = array();
	
	protected $_pass = true;
	
	protected $_errors = array();
	
	public function __construct($field, Array $rules = array())
	{
		$this->_field = $field;
		
		foreach ( $rules as $field => $rule )
		{
			if ( !is_a($rule, 'ValidationWall\Rule\RuleInterface') )
			{
				throw new Exception('Not a valid rule');
			}
		}
		
		$this->_rules = $rules;
	}
	
	public function pass(Array $data = array())
	{	
		foreach ( $this->_rules as $rule )
		{
			if ( !is_a($rule, 'ValidationWall\Rule\RuleInterface') )
			{
				throw new Exception('Not a valid rule');
			}
			
			if ( !$rule->validate($this->_field, $data) )
			{
				$this->_pass = false;
				$this->_errors[$this->_field] = $rule->_error_message;
				break;
			}
		}
		
		return $this->_pass;
	}
	
	public function getErrors()
	{
		return $this->_errors;
	}
	
	public function getField()
	{
		return $this->_field;
	}
}
