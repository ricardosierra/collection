--TEST--
Separate truthy values from falsey values.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'hello', null, 42, false, true, '', 17
	));

	echo $collection->partition->truthy->to_string;
	echo $collection->partition->falsey->to_string;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
contents:
  [0] => <string:5> "hello"
  [1] => <integer> 42
  [2] => <boolean> true
  [3] => <integer> 17

contents:
  [0] => <NULL>
  [1] => <boolean> false
  [2] => <string:0> ""
