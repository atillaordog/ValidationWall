<?php
namespace ValidationWall\Door;

use ValidationWall\Door\Door as Door;
use ValidationWall\RuleSet\Test as Test_Ruleset;

class Test extends Door
{
	public function __construct()
	{
		parent::__construct(array(new Test_Ruleset()));
	}
}