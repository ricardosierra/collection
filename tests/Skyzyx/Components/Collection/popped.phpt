--TEST--
Pop the last item off the end of the collection and return what's left.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->join . PHP_EOL;
	echo $collection->popped->join . PHP_EOL;
	echo $collection->popped->join . PHP_EOL;
	echo $collection->popped->join . PHP_EOL;
	echo $collection->popped->join . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghijklmnopqrstuvwxyz
abcdefghijklmnopqrstuvwxy
abcdefghijklmnopqrstuvwx
abcdefghijklmnopqrstuvw
abcdefghijklmnopqrstuv
