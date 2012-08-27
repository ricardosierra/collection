--TEST--
Collect all regular expression matches and non-matches.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	echo $collection->grep_key('/^[0-9]$/')->join . PHP_EOL;
	echo $collection->ungrep_key('/^[0-9]$/')->join . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
abcdefghij
klmnopqrstuvwxyz
