--TEST--
Unset indicies and reindex a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'g'));

	unset($collection[1]);
	$collection->remove(3);
	$collection->offsetUnset(5);

	print_r($collection->to_array);
	print_r($collection->reindex()->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => a
    [2] => c
    [4] => e
    [6] => g
)
Array
(
    [0] => a
    [1] => c
    [2] => e
    [3] => g
)
