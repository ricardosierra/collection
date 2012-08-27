--TEST--
Apply a callback function to the entire collection, then wrap that result in an object.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Object;

	$first = function($collection)
	{
		return array($collection->first);
	};

	$collection = new Collection(range('a', 'z'));
	$result = $collection->apply($first, Object::factory('AWS\Common\Generic\Collection'));

	var_dump($result->count);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
int(1)
