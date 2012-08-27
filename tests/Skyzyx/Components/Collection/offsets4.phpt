--TEST--
Change existing values to something new.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Set new values for existing nodes
	$collection[0] = 'alpha';
	$collection->set(1, 'beta');
	$collection->offsetSet(2, 'gamma');

	// Get the value of the indicies
	echo $collection[0] . PHP_EOL;
	echo $collection->get(1) . PHP_EOL;
	echo $collection->offsetGet(2) . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
alpha
beta
gamma
