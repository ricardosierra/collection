--TEST--
Sort objects with identical keys.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Accessor;

	// Create a collection of collections
	$collection = new Collection(array('a', 'a'));

	// Sort the collection by something that doesn't apply to all objects,
	// then map it with something that doesn't apply to all objects,
	// then convert to an array.
	print_r($collection->sort_by(Accessor::strval())->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [a] => a
)
