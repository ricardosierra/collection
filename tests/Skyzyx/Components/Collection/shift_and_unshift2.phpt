--TEST--
Shift and unshift a collection.

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

	// Unshift
	$collection->unshift('A');
	$collection->unshift('B');
	$collection->unshift('C');
	echo $collection->join(',') . PHP_EOL;

	echo PHP_EOL;

	// Shift
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo PHP_EOL . $collection->join(',');

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
C,B,A,value1,value2,value3,value4,value5

CBAvalue1value2
value3,value4,value5
