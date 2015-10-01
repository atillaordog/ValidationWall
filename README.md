ValidationWall
==============

A simple code that breaks down validation into small blocks

The whole idea is to be able to build custom validation as if they were legos. 
A rule is a lego that can be used together with other rules to build a ruleset. 
A ruleset is used to check one field from the incoming data.
A door on the wall can be built using rulesets. 
A door is the way trough the Wall, the whole data gets through it by using rulesets defined for every field.

How to use:

```php
include('ValidationWall/autoload.php');

// Before the class you need to define the uses
use ValidationWall;
use ValidationWall\RuleSet\PredefRuleset;
use ValidationWall\Door\PredefDoor;
use ValidationWall\Rule\NotEmpty;
use ValidationWall\Rule\Numeric;

// Build a ruleset using rules
$rulesets = array();
$rulesets[] = new PredefRuleset('input_field', array(new NotEmpty(), new Numeric()))

$door = new PredefDoor($rulesets);
		
$vw = new ValidationWall($door);

if ( $vw->pass($data) )
{
	// Validation passed
}
else
{
	// Validation failed
}
```

To pass a comparison variable, or another field from post for comparison, use the Rule's constructor as seen in predefined examples.

```php
$rule = new MaxLength(255);
```


