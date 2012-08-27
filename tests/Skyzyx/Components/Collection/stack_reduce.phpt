--TEST--
reduce() with a built-in stack.

--DESCRIPTION--
Iterate over the collection, passing each value to a callback function. The results of each run are stored in a stack, which is made available to the callback for reference.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range(0, 30));

	// Fibonnacci sequence!
	$result = $collection->stack_reduce(function($stack, $item, $key)
	{
		return $item < 2 ? $item : $stack[$item - 1] + $stack[$item - 2];
	});

	// Remove the "0" entry, re-format the number, then add linebreaks between each entry
	echo $result->shifted
	            ->map(function($item) {
	                  return number_format($item);
	              })
	            ->join(PHP_EOL);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
1
1
2
3
5
8
13
21
34
55
89
144
233
377
610
987
1,597
2,584
4,181
6,765
10,946
17,711
28,657
46,368
75,025
121,393
196,418
317,811
514,229
832,040
