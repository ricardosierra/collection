--TEST--
First and last sets of nodes.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->first . PHP_EOL;
	print_r($collection->first(3)->to_array);

	echo PHP_EOL;

	echo $collection->last . PHP_EOL;
	print_r($collection->last(3)->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
a
Array
(
    [0] => a
    [1] => b
    [2] => c
)

z
Array
(
    [0] => x
    [1] => y
    [2] => z
)
