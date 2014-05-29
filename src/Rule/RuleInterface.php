<?php

namespace ValidationWall\Rule;

interface RuleInterface
{
	public function validate($field, Array $data);
}

