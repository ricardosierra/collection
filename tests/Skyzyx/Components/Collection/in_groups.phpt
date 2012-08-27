--TEST--
Split the collection into a specific number of groups of approximately equal size.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(1, 74));

	print_r($collection->in_groups(3)->to_array(true));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
            [3] => 4
            [4] => 5
            [5] => 6
            [6] => 7
            [7] => 8
            [8] => 9
            [9] => 10
            [10] => 11
            [11] => 12
            [12] => 13
            [13] => 14
            [14] => 15
            [15] => 16
            [16] => 17
            [17] => 18
            [18] => 19
            [19] => 20
            [20] => 21
            [21] => 22
            [22] => 23
            [23] => 24
            [24] => 25
        )

    [1] => Array
        (
            [0] => 26
            [1] => 27
            [2] => 28
            [3] => 29
            [4] => 30
            [5] => 31
            [6] => 32
            [7] => 33
            [8] => 34
            [9] => 35
            [10] => 36
            [11] => 37
            [12] => 38
            [13] => 39
            [14] => 40
            [15] => 41
            [16] => 42
            [17] => 43
            [18] => 44
            [19] => 45
            [20] => 46
            [21] => 47
            [22] => 48
            [23] => 49
            [24] => 50
        )

    [2] => Array
        (
            [0] => 51
            [1] => 52
            [2] => 53
            [3] => 54
            [4] => 55
            [5] => 56
            [6] => 57
            [7] => 58
            [8] => 59
            [9] => 60
            [10] => 61
            [11] => 62
            [12] => 63
            [13] => 64
            [14] => 65
            [15] => 66
            [16] => 67
            [17] => 68
            [18] => 69
            [19] => 70
            [20] => 71
            [21] => 72
            [22] => 73
            [23] => 74
        )

)
