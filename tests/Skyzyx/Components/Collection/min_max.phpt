--TEST--
Get the largest individual value from a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Create a collection with a series of random items
	$collection = new Collection(array(
		25, 122, 37, 5, 68, 22, new Collection(), 'alpha', 'zeta', 10000000
	));

	var_dump($collection->min); # 5
	var_dump($collection->max); # zeta

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
int(5)
string(4) "zeta"
