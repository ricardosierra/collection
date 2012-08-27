--TEST--
Check if a value exists at an offset.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Check if they exist (yes)
	var_dump(isset($collection[0]));
	var_dump($collection->exists(0));
	var_dump($collection->offsetExists(0));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(true)
bool(true)
