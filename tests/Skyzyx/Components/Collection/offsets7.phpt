--TEST--
Retrieve the value at the given key.

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

	// Get the value of the index
	echo $collection['key1'] . PHP_EOL;
	echo $collection->key1 . PHP_EOL;
	echo $collection->get('key1') . PHP_EOL;
	echo $collection->offsetGet('key1') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
value1
value1
value1
value1
