--TEST--
Attempt to retrieve non-existent keys.

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

	// Get a non-existent key
	var_dump($collection['key6']);
	var_dump($collection->key7);
	var_dump($collection->get('key8'));
	var_dump($collection->offsetGet('key9'));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
NULL
NULL
NULL
NULL
