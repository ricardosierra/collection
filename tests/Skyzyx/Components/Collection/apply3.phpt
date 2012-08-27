--TEST--
Apply a callback function to the entire collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));
	$result = $collection->apply(function($collection)
	{
		return $collection->first;

	}, 'not_a_valid_wrapper_so_ignoring');

	var_dump($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
string(1) "a"
