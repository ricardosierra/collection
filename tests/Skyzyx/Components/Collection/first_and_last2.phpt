--TEST--
First and last sets of nodes.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'key1' => 'value1',
		'key2' => 'value2',
		'key3' => 'value3',
		'key4' => 'value4',
		'key5' => 'value5'
	));

	echo $collection->first . PHP_EOL;
	print_r($collection->first(3)->to_array);

	echo PHP_EOL;

	echo $collection->last . PHP_EOL;
	print_r($collection->last(3)->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
value1
Array
(
    [key1] => value1
    [key2] => value2
    [key3] => value3
)

value5
Array
(
    [key3] => value3
    [key4] => value4
    [key5] => value5
)
