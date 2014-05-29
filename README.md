ValidationWall
==============

A simple code that breaks down validation into small blocks

The whole idea is to be able to build custom validation as if they were legos. 
A rule is a lego that can be used together with other rules to build a ruleset. 
A ruleset is used to check one field from the incoming data.
A door on the wall can be built using rulesets. 
A door is the way trough the Wall, the whole data gets through it by using rulesets defined for every field.

How to use:

include('ValidationWall/autoload.php');


use ValidationWall\Door\Test as Test_Door;
$vw = new ValidationWall(new Test_Door());

var_dump($vw->pass(array('a' => 'a')));

To pass a comparison variable, or another field from post for comparison, use the Rule's constructor as seen in predefined examples.


