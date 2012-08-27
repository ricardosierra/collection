--TEST--
Find the different values between two collections.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$primary_collection = new Collection(range('a', 'p'));
	$secondary_collection = new Collection(range('k', 'z'));

	$results = $primary_collection->diff($secondary_collection);

	print_r($results->to_array);

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
    [10] => q
    [11] => r
    [12] => s
    [13] => t
    [14] => u
    [15] => v
    [16] => w
    [17] => x
    [18] => y
    [19] => z
)
