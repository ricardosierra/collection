--TEST--
Convert the contents of a list into a sentence.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'this', 'that', 'the other'
	));

	$callback = function($value, $key)
	{
		switch ($key)
		{
			case 0:
				return sprintf('<a href="http://google.com">%s</a>', ucfirst($value));

			case 1:
				return sprintf('<a href="http://bing.com">%s</a>', $value);

			case 2:
				return sprintf('<a href="http://search.yahoo.com">%s</a>', $value);
		}
	};

	echo $collection->to_sentence($callback) . '.';

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
<a href="http://google.com">This</a>, <a href="http://bing.com">that</a> and <a href="http://search.yahoo.com">the other</a>.
