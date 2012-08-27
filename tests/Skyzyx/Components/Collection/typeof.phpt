--TEST--
Get the type of a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	var_dump($collection->typeof);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
string(29) "AWS\Common\Generic\Collection"
