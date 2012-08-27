--TEST--
Sort a collection by a specific parameter.

--DESCRIPTION--
**NOTE:** If two members compare as equal, their order in the sorted array is undefined.

In this case, one of the collections is dropped entirely. This is the result of using PHP's <php:usort()> and <php:uksort()> functions.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Create a collection of collections
	$collection = new Collection(array(
		new Collection(array(
			'key1' => 'value9',
			'key2' => 'value8',
			'key3' => 'value7',
			'key4' => 'value6',
			'key5' => 'value5'
		)),
		new Collection(array(
			'key1' => 'value1',
			'key2' => 'value2',
			'key3' => 'value3',
			'key4' => 'value4',
			'key5' => 'value5'
		))
	));

	// Sort the collection, then merge each of the sub-collections into strings
	$sorted = $collection->sort_by(function($value)
	{
		return $value->last;
	})
	->map(function($value)
	{
		return $value->reverse->join('.');
	});

	// Display the collection as an array
	print_r($sorted->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => value5.value4.value3.value2.value1
)
