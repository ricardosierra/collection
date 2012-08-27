--TEST--
Filter a collection with a callback function.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	$callback = function($item, $key)
	{
		return ($key % 2) ? $item : false;
	};

	// Keep all even-numbered letters
	$result = $collection->filter_by($callback)->to_array;
	print_r($result);

	// Reject all even-numbered letters
	$result = $collection->reject($callback)->to_array;
	print_r($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [1] => b
    [3] => d
    [5] => f
    [7] => h
    [9] => j
    [11] => l
    [13] => n
    [15] => p
    [17] => r
    [19] => t
    [21] => v
    [23] => x
    [25] => z
)
Array
(
    [0] => a
    [2] => c
    [4] => e
    [6] => g
    [8] => i
    [10] => k
    [12] => m
    [14] => o
    [16] => q
    [18] => s
    [20] => u
    [22] => w
    [24] => y
)
