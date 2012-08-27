--TEST--
Shuffle the contents of a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	print_r($collection->shuffle()->to_array);
	print_r($collection->randomize()->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECTF--
Array
(
    [0] => %s
    [1] => %s
    [2] => %s
    [3] => %s
    [4] => %s
    [5] => %s
    [6] => %s
    [7] => %s
    [8] => %s
    [9] => %s
    [10] => %s
    [11] => %s
    [12] => %s
    [13] => %s
    [14] => %s
    [15] => %s
    [16] => %s
    [17] => %s
    [18] => %s
    [19] => %s
    [20] => %s
    [21] => %s
    [22] => %s
    [23] => %s
    [24] => %s
    [25] => %s
)
Array
(
    [0] => %s
    [1] => %s
    [2] => %s
    [3] => %s
    [4] => %s
    [5] => %s
    [6] => %s
    [7] => %s
    [8] => %s
    [9] => %s
    [10] => %s
    [11] => %s
    [12] => %s
    [13] => %s
    [14] => %s
    [15] => %s
    [16] => %s
    [17] => %s
    [18] => %s
    [19] => %s
    [20] => %s
    [21] => %s
    [22] => %s
    [23] => %s
    [24] => %s
    [25] => %s
)
