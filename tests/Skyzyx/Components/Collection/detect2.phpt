--TEST--
Fail to detect.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(-5, 0));

	// Test if the value is above zero
	$result = $collection->detect(function($value, $key)
	{
		return ($value > 0);
	});

	var_dump($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(false)
