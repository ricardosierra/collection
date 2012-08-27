--TEST--
Test whether or not the values in a collection pass tests.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	var_dump($collection->every('/[a-z]/'));  // Does every item exist between letters A-Z?
	var_dump($collection->every('/[a-m]/'));  // Does every item exist between letters A-M?
	var_dump($collection->all('/[1-10]/')); // Does every item exist between numbers 1-10?

	echo PHP_EOL;

	var_dump($collection->any('/[a-z]/'));  // Do some items exist between letters A-Z?
	var_dump($collection->any('/[a-m]/'));  // Do some items exist between letters A-M?
	var_dump($collection->any('/[1-10]/')); // Do some items exist between numbers 1-10?

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(false)
bool(false)

bool(true)
bool(true)
bool(false)
