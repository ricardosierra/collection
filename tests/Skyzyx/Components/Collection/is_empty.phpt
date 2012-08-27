--TEST--
Checks to see whether or not the collection is empty.

--DESCRIPTION--
Since PHP 5.3, it is possible to leave out the middle part of the ternary operator. Expression
<code>expr1 ?: expr3</code> returns <code>expr1</code> if <code>expr1</code> evaluates to <code>true</code>,
and <code>expr3</code> otherwise.

This allows us to more closely emulate some of Ruby's <code>method?</code> syntax.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection1 = new Collection();
	var_dump($collection1->is_empty);

	echo ($collection1->is_empty? :false) ? 'empty' : 'not empty';
	echo PHP_EOL;

	$collection2 = new Collection(range('a', 'z'));
	var_dump($collection2->is_empty);

	echo ($collection2->is_empty? :false) ? 'empty' : 'not empty';
	echo PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
bool(true)
empty
bool(false)
not empty
