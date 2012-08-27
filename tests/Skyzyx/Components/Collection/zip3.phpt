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

	// Zip some unevenly-lengthed collections
	$zipped = $a->zip(
		new Collection(array(1, 2)),
		new Collection(array(8))
	);

	// Stringify each of the zipped collections
	$zipped = $zipped->map(function($value)
	{
		return '[' . $value->join(', ') . ']';
	});

	// Stringify the parent collection
	echo '[' . $zipped->join(', ') . ']' . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
[[4, 1, 8], [5, 2, ], [6, , ]]
