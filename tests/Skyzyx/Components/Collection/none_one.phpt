--TEST--
Determine whether or not there are none or only one truthy value in a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Set up collections
	$collection_with_none = new Collection(array(
		false, null, 0, ''
	));
	$collection_with_one = new Collection(array(
		false, null, 0, '', 42
	));
	$collection_with_two = new Collection(array(
		false, null, 0, '', 42, 'apples'
	));

	// Test "none"
	echo (($collection_with_none->none? :false) ? 'none' : 'not none') . PHP_EOL;
	echo (($collection_with_none->only_one? :false) ? 'one' : 'not one') . PHP_EOL;

	echo PHP_EOL;

	// Test "one"
	echo (($collection_with_one->none? :false) ? 'none' : 'not none') . PHP_EOL;
	echo (($collection_with_one->only_one? :false) ? 'one' : 'not one') . PHP_EOL;

	echo PHP_EOL;

	// Test "two"
	echo (($collection_with_two->none? :false) ? 'none' : 'not none') . PHP_EOL;
	echo (($collection_with_two->only_one? :false) ? 'one' : 'not one') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
none
not one

not none
one

not none
not one
