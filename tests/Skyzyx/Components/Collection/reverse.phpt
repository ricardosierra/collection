--TEST--
Reverse the order of the items in the collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	print_r($collection->reverse->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => z
    [1] => y
    [2] => x
    [3] => w
    [4] => v
    [5] => u
    [6] => t
    [7] => s
    [8] => r
    [9] => q
    [10] => p
    [11] => o
    [12] => n
    [13] => m
    [14] => l
    [15] => k
    [16] => j
    [17] => i
    [18] => h
    [19] => g
    [20] => f
    [21] => e
    [22] => d
    [23] => c
    [24] => b
    [25] => a
)
