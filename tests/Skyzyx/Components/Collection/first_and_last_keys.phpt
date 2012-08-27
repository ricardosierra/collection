--TEST--
First and last sets of keys.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->first_key . PHP_EOL;
	print_r($collection->first_key(3)->to_array);

	echo PHP_EOL;

	echo $collection->last_key . PHP_EOL;
	print_r($collection->last_key(3)->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
0
Array
(
    [0] => 0
    [1] => 1
    [2] => 2
)

25
Array
(
    [0] => 23
    [1] => 24
    [2] => 25
)
