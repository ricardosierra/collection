--TEST--
Test whether or not this collection is the same as another collection using a callback.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection1 = new Collection(range('a', 'z'));
	$collection2 = clone $collection1;
	$collection3 = clone $collection2;

	// is(), same_as(), identical_to() and equal_to() are all aliases of each other.
	var_dump($collection1->is($collection2, 'serialize'));
	var_dump($collection2->same_as($collection3, 'serialize'));
	var_dump($collection3->identical_to($collection1, 'serialize'));

	// Change a collection and re-compare.
	$collection1[] = 123;
	var_dump($collection1->equal_to($collection2, 'serialize'));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(true)
bool(true)
bool(false)
