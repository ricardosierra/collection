--TEST--
Compress and reindex a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'g'));

	$collection[0] = null;
	$collection[1] = null;
	$collection[2] = null;

	print_r($collection->to_array);
	print_r($collection->compress()->to_array);
	print_r($collection->compress()->reindex()->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] =>
    [1] =>
    [2] =>
    [3] => d
    [4] => e
    [5] => f
    [6] => g
)
Array
(
    [3] => d
    [4] => e
    [5] => f
    [6] => g
)
Array
(
    [0] => d
    [1] => e
    [2] => f
    [3] => g
)
