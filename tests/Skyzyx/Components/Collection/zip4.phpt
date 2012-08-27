--TEST--
Zip multiple collections together, applying a callback function to each item.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(1, 3));
	$a = new Collection(range(4, 6));
	$b = new Collection(range(7, 9));

	// Zip $a and $b into $collection, applying a callback to each item
	$zipped = $collection->zip($a, $b, function($value)
	{
		return $value * 2;
	});

	// Convert to a string for readability
	$zipped = $zipped->map(function($value)
	{
		return '[' . $value->join(', ') . ']';
	});

	echo '[' . $zipped->join(', ') . ']' . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
[[2, 8, 14], [4, 10, 16], [6, 12, 18]]
