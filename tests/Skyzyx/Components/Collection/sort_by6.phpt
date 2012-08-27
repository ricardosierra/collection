--TEST--
Sort a collection where not all items in the collection are of the same type.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Create a collection of collections
	$collection = new Collection(array(
		new Collection(range('a', 'z')),
		new Collection(range(500, 505)),
		72,
		'aardvark',
		array('red', 'green', 'blue'),
		array(),
		array(
			'key' => 'value'
		)
	));

	// Sort the collection by something that doesn't apply to all objects,
	// then map it with something that doesn't apply to all objects,
	// then convert to an array.
	print_r($collection->sort_by('first')->map('concat')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => Array
        (
        )

    [1] => 72
    [2] => 500501502503504505
    [3] => abcdefghijklmnopqrstuvwxyz
    [4] => aardvark
    [5] => Array
        (
            [0] => red
            [1] => green
            [2] => blue
        )

    [6] => Array
        (
            [key] => value
        )

)
