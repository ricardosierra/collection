--TEST--
Sort a collection by a specific parameter (using the shorter, convenience syntax).

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Create a collection of collections
	$collection = new Collection(array(
		new Collection(range('Z', 'A')),
		new Collection(range('a', 'z')),
		new Collection(range(500, 505)),
		new Collection(range('m', 'p')),
	));

	// Sort the collection, then merge each of the sub-collections into strings
	print_r($collection->sort_by('first')->map('concat')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 500501502503504505
    [1] => abcdefghijklmnopqrstuvwxyz
    [2] => mnop
    [3] => ZYXWVUTSRQPONMLKJIHGFEDCBA
)
