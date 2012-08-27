--TEST--
Apply a callback to each item in a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Accessor;

	$collection = new Collection(array(
		'key1' => 'value1',
		'key2' => 'value2',
		'key3' => 'value3',
		'key4' => 'value4',
		'key5' => 'value5'
	));

	// These are identical
	echo $collection->map    (Accessor::strtoupper())->join(',') . PHP_EOL;
	echo $collection->collect(Accessor::strtoupper())->join(',') . PHP_EOL;
	echo $collection->invoke (Accessor::strtoupper())->join(',') . PHP_EOL;
	echo $collection->pluck  (Accessor::strtoupper())->join(',') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
VALUE1,VALUE2,VALUE3,VALUE4,VALUE5
VALUE1,VALUE2,VALUE3,VALUE4,VALUE5
VALUE1,VALUE2,VALUE3,VALUE4,VALUE5
VALUE1,VALUE2,VALUE3,VALUE4,VALUE5
