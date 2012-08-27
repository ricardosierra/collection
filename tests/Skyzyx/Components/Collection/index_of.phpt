--TEST--
Search the collection for a specific value and return the corresponding key.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'key1' => 'value',
		'key2' => 'value2',
		'key3' => 'value',
		'key4' => 'value',
		'key5' => 'value'
	));

	// Multiple keys match the value
	echo $collection->index_of('value') . PHP_EOL;
	echo $collection->last_index_of('value') . PHP_EOL;

	echo PHP_EOL;

	// A single key matches the value
	echo $collection->index_of('value2') . PHP_EOL;
	echo $collection->last_index_of('value2') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
key1
key5

key2
key2
