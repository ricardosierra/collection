--TEST--
Test whether or not the values in a collection pass tests.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(0, 99));

	// Does every item in the collection have a value of less than 100?
	$result = $collection->every(function($value)
	{
		return ($value < 100);
	});
	var_dump($result);

	// Does every item in the collection have a value of less than 50?
	$result = $collection->every(function($value)
	{
		return ($value < 50);
	});
	var_dump($result);

	// Do any items in the collection have a value of less than 100?
	$result = $collection->any(function($value)
	{
		return ($value < 100);
	});
	var_dump($result);

	// Do any items in the collection have a value of less than 50?
	$result = $collection->any(function($value)
	{
		return ($value < 50);
	});
	var_dump($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(false)
bool(true)
bool(true)
