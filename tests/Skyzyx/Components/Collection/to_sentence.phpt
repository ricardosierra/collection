--TEST--
Convert the contents of a list into a sentence.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$beatles = new Collection(array(
		'John',
		'Paul',
		'George',
		'Ringo'
	));

	echo $beatles->to_sentence . PHP_EOL;
	echo $beatles->popped->to_sentence . PHP_EOL;
	echo $beatles->popped->to_sentence . PHP_EOL;
	echo $beatles->popped->to_sentence . PHP_EOL;
	echo $beatles->popped->to_sentence . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
John, Paul, George and Ringo
John, Paul and George
John and Paul
John
