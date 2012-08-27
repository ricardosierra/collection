--TEST--
Fail and throw an exception.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Exception;

	$collection = new Collection(range('a', 'z'));

	try
	{
		// tap() is an alias for apply()
		$result = $collection->tap('invalid_callback', 'not_a_valid_wrapper_so_ignoring');
		var_dump($result);
	}
	catch (Exception $exception)
	{
		echo $exception->message;
	}

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Neither the callback function nor the wrapper function were callable.
