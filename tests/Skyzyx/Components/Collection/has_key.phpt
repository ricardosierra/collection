--TEST--
Check if a collection contains specific keys.

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

	// has_key() and includes_key() are identical
	var_dump($collection->has_key('key1'));
	var_dump($collection->has_key('key100'));
	var_dump($collection->has_key('key1', 'key2', 'key3', 'key4'));
	var_dump($collection->has_key('key1', 'key2', 'key3', 'key4', 'xenomorphic'));

	echo PHP_EOL;

	// has_key() and contains_key() are identical
	var_dump($collection->contains_key('key1'));
	var_dump($collection->contains_key('key100'));
	var_dump($collection->contains_key('key1', 'key2', 'key3', 'key4'));
	var_dump($collection->contains_key('key1', 'key2', 'key3', 'key4', 'xenomorphic'));

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
