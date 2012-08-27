--TEST--
Filter or reject collection items.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Accessor;

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

	print_r($collection->filter_by(Accessor::is_scalar())->to_array);
	print_r($collection->find_all(Accessor::is_scalar())->to_array);
	print_r($collection->reject   (Accessor::is_scalar())->map('to_array')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 25
    [1] => 122
    [2] => 37
    [3] => 5
    [4] => 68
    [5] => 22
    [7] => alpha
    [8] => zeta
    [9] => 10000000
)
Array
(
    [0] => 25
    [1] => 122
    [2] => 37
    [3] => 5
    [4] => 68
    [5] => 22
    [7] => alpha
    [8] => zeta
    [9] => 10000000
)
Array
(
    [0] => Array
        (
            [key] => value
            [key2] => value2
        )

)
