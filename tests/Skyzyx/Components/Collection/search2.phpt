--TEST--
Search the collection for a specific value and return the corresponding key.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'key1' => 'value',
		'key2' => 'value2',
		'key3' => 'value',
		'key4' => 'value',
		'key5' => 'value'
	));

	print_r($collection->search('value')->to_array);
	var_dump($collection->search('value2')->first);
	var_dump($collection->search('value1000')->first);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => key1
    [1] => key3
    [2] => key4
    [3] => key5
)
string(4) "key2"
NULL
