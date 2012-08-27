--TEST--
Reduce the collection down to a single value, passing the output of the previous iteration as the input to the current iteration.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// reduce() and each_with_object() are identical
	echo $collection->reduce('', function($reducer, $element)
	{
		return $reducer .= $element;
	});

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghijklmnopqrstuvwxyz
