--TEST--
Merge multiple collections into the current collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));
	$mergable1 = new Collection(range('A', 'Z'));
	$mergable2 = new Collection(range(1, 10));

	$merged_collection = $collection->merge($mergable1, $mergable2)->join();

	print_r($merged_collection);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ12345678910
