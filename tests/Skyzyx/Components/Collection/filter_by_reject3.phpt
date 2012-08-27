--TEST--
Filter or reject by a single property.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Enum;

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
		new Enum(),
		'alpha',
		'zeta',
		10000000
	));

	// select() is an alias of filter_by()
	print_r($collection->select ('first')->map('to_array')->to_array);

	// exclude() is an alias of reject()
	print_r($collection->exclude('first')->map('to_array')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => Array
        (
            [key] => value
            [key2] => value2
        )

)
Array
(
    [0] => 25
    [1] => 122
    [2] => 37
    [3] => 5
    [4] => 68
    [5] => 22
    [6] => AWS\Common\Generic\Enum Object
        (
        )

    [7] => alpha
    [8] => zeta
    [9] => 10000000
)
