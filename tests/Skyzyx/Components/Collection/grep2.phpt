--TEST--
Collect all regular expression matches and non-matches, checking that the original keys are maintained.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->grep('/[a-m]/')->keys->join('.') . PHP_EOL;
	echo $collection->ungrep('/[a-m]/')->keys->join('.') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
0.1.2.3.4.5.6.7.8.9.10.11.12
13.14.15.16.17.18.19.20.21.22.23.24.25
