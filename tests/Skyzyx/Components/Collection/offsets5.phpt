--TEST--
Remove/unset specific indicies and add an entirely new index.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Remove/unset indicies
	unset($collection[23]);
	$collection->remove(24);
	$collection->offsetUnset(25);

	// Add a new index
	$collection[100] = 'New Index';

	print_r($collection->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => a
    [1] => b
    [2] => c
    [3] => d
    [4] => e
    [5] => f
    [6] => g
    [7] => h
    [8] => i
    [9] => j
    [10] => k
    [11] => l
    [12] => m
    [13] => n
    [14] => o
    [15] => p
    [16] => q
    [17] => r
    [18] => s
    [19] => t
    [20] => u
    [21] => v
    [22] => w
    [100] => New Index
)
