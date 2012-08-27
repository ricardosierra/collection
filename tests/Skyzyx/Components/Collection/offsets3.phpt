--TEST--
Retrieve the value at the given index.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Get the value of the index
	echo $collection[0] . PHP_EOL;
	echo $collection->get(0) . PHP_EOL;
	echo $collection->offsetGet(0) . PHP_EOL;

	echo PHP_EOL;

	// Get the value of the index
	echo $collection[25] . PHP_EOL;
	echo $collection->get(25) . PHP_EOL;
	echo $collection->offsetGet(25) . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
a
a
a

z
z
z
