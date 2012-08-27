--TEST--
Use the iteration methods to move over a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));
	$collection->rewind();

	while ($collection->valid)
	{
		echo '[' . $collection->key . '] ' . $collection->current . PHP_EOL;
		$collection->next();
	}

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
[0] a
[1] b
[2] c
[3] d
[4] e
[5] f
[6] g
[7] h
[8] i
[9] j
[10] k
[11] l
[12] m
[13] n
[14] o
[15] p
[16] q
[17] r
[18] s
[19] t
[20] u
[21] v
[22] w
[23] x
[24] y
[25] z
