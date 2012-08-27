--TEST--
Convert a collection into a JSON string.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		25,
		122,
		37,
		5,
		68,
		22,
		new Collection(array(
			'key' => 'value',
			'key2' => 'value2'
		)),
		'alpha',
		'zeta',
		10000000
	));

	print_r($collection->to_json);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
[25,122,37,5,68,22,{"key":"value","key2":"value2"},"alpha","zeta",10000000]
