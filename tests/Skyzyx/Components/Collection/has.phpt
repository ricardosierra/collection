--TEST--
Check if a collection contains specific items.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// has() and contains() are identical
	var_dump($collection->has('a'));
	var_dump($collection->has('A'));
	var_dump($collection->has('a', 'b', 'c', 'd'));
	var_dump($collection->has('a', 'b', 'c', 'd', 'xenomorphic'));

	echo PHP_EOL;

	// has() and contains() are identical
	var_dump($collection->contains('a'));
	var_dump($collection->contains('A'));
	var_dump($collection->contains('a', 'b', 'c', 'd'));
	var_dump($collection->contains('a', 'b', 'c', 'd', 'xenomorphic'));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
bool(false)
bool(true)
bool(false)

bool(true)
bool(false)
bool(true)
bool(false)
