--TEST--
Push and pop a collection.

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

	// Push
	$collection->push('A');
	$collection->push('B');
	$collection->push('C');
	echo $collection->join(',') . PHP_EOL;

	echo PHP_EOL;

	// Pop
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo PHP_EOL . $collection->join(',');

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
value1,value2,value3,value4,value5,A,B,C

CBAvalue5value4
value1,value2,value3
