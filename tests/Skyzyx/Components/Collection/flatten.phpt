--TEST--
Flatten a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		1, 2, 3, 4, array(10, 12, 14, 16), 'a', 'b', 'c',
		new Collection(range('m', 'r')),
		new ArrayObject(range('v', 'z')), 1000000
	));

	print_r($collection->flatten->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 10
    [5] => 12
    [6] => 14
    [7] => 16
    [8] => a
    [9] => b
    [10] => c
    [11] => AWS\Common\Generic\Collection Object
        (
            [collection:AWS\Common\Generic\Collection:private] => ArrayObject Object
                (
                    [storage:ArrayObject:private] => Array
                        (
                            [0] => m
                            [1] => n
                            [2] => o
                            [3] => p
                            [4] => q
                            [5] => r
                        )

                )

            [iterator:AWS\Common\Generic\Collection:private] => ArrayIterator Object
                (
                    [storage:ArrayIterator:private] => ArrayObject Object
                        (
                            [storage:ArrayObject:private] => Array
                                (
                                    [0] => m
                                    [1] => n
                                    [2] => o
                                    [3] => p
                                    [4] => q
                                    [5] => r
                                )

                        )

                )

        )

    [12] => ArrayObject Object
        (
            [storage:ArrayObject:private] => Array
                (
                    [0] => v
                    [1] => w
                    [2] => x
                    [3] => y
                    [4] => z
                )

        )

    [13] => 1000000
)
