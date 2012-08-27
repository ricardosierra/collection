--TEST--
Count the number of items in a AWS\Common\Generic\Collection, using factory().

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	var_dump(
		Collection::factory(range('a', 'z'))->count()
	);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
int(26)
