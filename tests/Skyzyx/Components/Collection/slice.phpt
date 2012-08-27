--TEST--
Retrieve a custom slice of a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->slice(5)->join() . PHP_EOL;
	echo $collection->slice(5, 20)->join() . PHP_EOL;
	echo $collection->slice(-5)->join() . PHP_EOL;
	echo $collection->slice(-20, -5)->join() . PHP_EOL;
	echo $collection->slice(20, 100)->join() . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
fghijklmnopqrstuvwxyz
fghijklmnopqrstuvwxy
vwxyz
ghijklmnopqrstu
uvwxyz
