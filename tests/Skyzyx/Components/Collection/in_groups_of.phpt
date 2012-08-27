--TEST--
Chunk a collection into subsets of collections.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Break the collection into chunks, with each piece containing 5 items
	$chunked = $collection->in_groups_of(5);

	// Stringify each chunk
	$chunked = $chunked->map(function($value)
	{
		return $value->join;
	});

	print_r($chunked->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => abcde
    [1] => fghij
    [2] => klmno
    [3] => pqrst
    [4] => uvwxy
    [5] => z
)
