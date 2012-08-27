--TEST--
First and last sets of keys.

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

	echo $collection->first_key . PHP_EOL;
	print_r($collection->first_key(3)->to_array);

	echo PHP_EOL;

	echo $collection->last_key . PHP_EOL;
	print_r($collection->last_key(3)->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
key1
Array
(
    [0] => key1
    [1] => key2
    [2] => key3
)

key5
Array
(
    [0] => key3
    [1] => key4
    [2] => key5
)
