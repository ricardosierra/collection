--TEST--
Find the union between multiple collections.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$primary_collection = new Collection(range('a', 'p'));
	$secondary_collection = new Collection(range('k', 'z'));
	$tertiary_collection = new Collection(range('c', 'x'));

	$results = $primary_collection->union($secondary_collection, $tertiary_collection);

	print_r($results->join);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghijklmnopqrstuvwxyz
