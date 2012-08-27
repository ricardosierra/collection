--TEST--
Zip multiple collections together.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(1, 2));
	$a = new Collection(range(4, 6));
	$b = new Collection(range(7, 9));

	// Zip $a and $b into $collection, then convert to a string for readability
	$zipped = $collection->zip($a, $b)->map(function($value)
	{
		return '[' . $value->join(', ') . ']';
	});

	echo '[' . $zipped->join(', ') . ']' . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
[[1, 4, 7], [2, 5, 8]]
