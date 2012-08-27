--TEST--
Get the largest individual value from a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	// Create a collection of collections
	$collection = new Collection(array(
		new Collection(range('Z', 'A')),
		new Collection(range('a', 'z')),
		new Collection(range(500, 505)),
		new Collection(range('m', 'p')),
	));

	// Call last() on each sub-collection
	var_dump($collection->min('last')->join('.'));

	// Call first() on each sub-collection
	var_dump($collection->max('first')->join('.'));

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
string(23) "500.501.502.503.504.505"
string(51) "Z.Y.X.W.V.U.T.S.R.Q.P.O.N.M.L.K.J.I.H.G.F.E.D.C.B.A"
