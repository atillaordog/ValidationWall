<?php

namespace ValidationWall\RuleSet;

interface RuleSetInterface
{
	public function pass();
	public function getErrors();
}