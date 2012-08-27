--TEST--
Perform a deep flattening on a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		1, 2, 3, 4, array(10, 12, 14, 16), 'a', 'b', 'c',
		new Collection(range('m', 'r')),
		new ArrayObject(range('v', 'z')), 1000000
	));

	print_r($collection->flatten(true)->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 10
    [5] => 12
    [6] => 14
    [7] => 16
    [8] => a
    [9] => b
    [10] => c
    [11] => m
    [12] => n
    [13] => o
    [14] => p
    [15] => q
    [16] => r
    [17] => m
    [18] => n
    [19] => o
    [20] => p
    [21] => q
    [22] => r
    [23] => v
    [24] => w
    [25] => x
    [26] => y
    [27] => z
    [28] => 1000000
)
