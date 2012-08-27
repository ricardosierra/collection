--TEST--
Count the number of items in a Generic\Collection.

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

	var_dump($collection->count);
	var_dump($collection->length);
	var_dump($collection->size);
	var_dump(count($collection));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
int(5)
int(5)
int(5)
int(5)
