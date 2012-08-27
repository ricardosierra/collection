--TEST--
Customized sentence delimiters.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'this', 'that', 'the other'
	));

	echo $collection->to_sentence(array(
		'word_separator' => ' + ',
		'last_word_separator' => ' & '
	)) . '.';

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
this + that & the other.
