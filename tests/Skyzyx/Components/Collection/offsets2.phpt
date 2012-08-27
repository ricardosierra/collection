--TEST--
Check if a value exists at an offset.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Check if they exist (no)
	var_dump(isset($collection[30]));
	var_dump($collection->exists(30));
	var_dump($collection->offsetExists(30));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(false)
bool(false)
bool(false)
