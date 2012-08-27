--TEST--
Set and retrieve values as properties.

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

	// Set the value of the key
	$collection['key1'] = 'alpha';
	$collection->key2 = 'beta';
	$collection->set('key3', 'gamma');
	$collection->offsetSet('key4', 'delta');

	// Get the value of the key
	echo $collection['key1'] . PHP_EOL;
	echo $collection->key2 . PHP_EOL;
	echo $collection->get('key3') . PHP_EOL;
	echo $collection->offsetGet('key4') . PHP_EOL;
	echo $collection->key5 . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
alpha
beta
gamma
delta
value5
