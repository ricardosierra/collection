--TEST--
Accumulate a new value on each iteration of the collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Make a clone and modify it
	$collection2 = clone $collection;
	$collection2[] = 'ABC';

	echo $collection->join . PHP_EOL;
	echo $collection2->join . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghijklmnopqrstuvwxyz
abcdefghijklmnopqrstuvwxyzABC
