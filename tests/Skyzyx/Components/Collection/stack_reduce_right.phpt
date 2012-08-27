--TEST--
reduce_right() with a built-in stack.

--DESCRIPTION--
Iterate over the collection, passing each value to a callback function. The results of each run are stored in a stack, which is made available to the callback for reference.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(0, 30));

	$result = $collection->stack_reduce_right(function($stack, $item, $key)
	{
		return $item;
	});

	print_r($result->join(','));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
30,29,28,27,26,25,24,23,22,21,20,19,18,17,16,15,14,13,12,11,10,9,8,7,6,5,4,3,2,1,0
