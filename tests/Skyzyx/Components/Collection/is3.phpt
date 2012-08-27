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
	$result = $collection1->is($collection2, function($collection)
	{
		return $collection->first;
	});
	var_dump($result);

	$result = $collection2->same_as($collection3, function($collection)
	{
		return $collection->last;
	});
	var_dump($result);

	$collection3->append(123);
	$result = $collection3->same_as($collection1, function($collection)
	{
		return $collection->serialize();
	});
	var_dump($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(true)
bool(false)
