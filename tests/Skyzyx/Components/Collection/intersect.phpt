--TEST--
Find the duplicate values between two collections.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$primary_collection = new Collection(range('a', 'p'));
	$secondary_collection = new Collection(range('k', 'z'));

	$results = $primary_collection->intersect($secondary_collection);

	print_r($results->to_array);
	print_r($results->reindex->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [10] => k
    [11] => l
    [12] => m
    [13] => n
    [14] => o
    [15] => p
)
Array
(
    [0] => k
    [1] => l
    [2] => m
    [3] => n
    [4] => o
    [5] => p
)
