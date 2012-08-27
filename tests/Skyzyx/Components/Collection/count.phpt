--TEST--
Count the number of items in a Generic\Collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	var_dump($collection->count);
	var_dump($collection->length);
	var_dump($collection->size);
	var_dump(count($collection));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
int(26)
int(26)
int(26)
int(26)
