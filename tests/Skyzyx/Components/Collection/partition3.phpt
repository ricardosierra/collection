--TEST--
Separate truthy values from falsey values.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Enum;

	$collection = new Collection(array(
		new Collection(),
		new Enum()
	));

	echo $collection->partition('first')->truthy->to_string;
	echo $collection->partition('first')->falsey->to_string;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
contents:
  [0] => <AWS\Common\Generic\Enum:0> []

contents:
  [0] => <AWS\Common\Generic\Collection:0> []
