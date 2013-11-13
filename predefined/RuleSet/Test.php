<?php

namespace ValidationWall\RuleSet;

use ValidationWall\RuleSet\RuleSet as Ruleset;
use ValidationWall\Rule\NotEmpty as NotEmpty;

class Test extends RuleSet
{
	public function __construct()
	{
		parent::__construct('a', array(new NotEmpty()));
	}
}