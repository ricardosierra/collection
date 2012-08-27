--TEST--
Apply a callback to each item in a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Accessor;

	$collection = new Collection(array(
		new Collection(range('a', 'z')),
		new Collection(range('a', 'z')),
		new Collection(range('a', 'z')),
		new Collection(range('a', 'z')),
	));

	print_r($collection->pluck('first')->to_array);
	print_r($collection->pluck('last')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => a
    [1] => a
    [2] => a
    [3] => a
)
Array
(
    [0] => z
    [1] => z
    [2] => z
    [3] => z
)
