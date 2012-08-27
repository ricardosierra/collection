--TEST--
Check if a collection contains specific items.

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

	// has() and contains() are identical
	var_dump($collection->has('value1'));
	var_dump($collection->has('value100'));
	var_dump($collection->has('value1', 'value2', 'value3', 'value4'));
	var_dump($collection->has('value1', 'value2', 'value3', 'value4', 'xenomorphic'));

	echo PHP_EOL;

	// has() and contains() are identical
	var_dump($collection->contains('value1'));
	var_dump($collection->contains('value100'));
	var_dump($collection->contains('value1', 'value2', 'value3', 'value4'));
	var_dump($collection->contains('value1', 'value2', 'value3', 'value4', 'xenomorphic'));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(false)
bool(true)
bool(false)

bool(true)
bool(false)
bool(true)
bool(false)
