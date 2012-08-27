--TEST--
Separate truthy values from falsey values.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Enum;

	$collection = new Collection(array(true, false));

	echo $collection->segregate(true)->truthy->to_string;
	echo $collection->segregate(true)->falsey->to_string;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
contents:
  [0] => <boolean> true

contents:
  [0] => <boolean> false
