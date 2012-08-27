--TEST--
Sort a collection by a specific parameter.

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

	// Sort the collection, then merge each of the sub-collections into strings
	$sorted = $collection->sort_by(function($value)
	{
		return $value->first;
	})
	->map(function($value)
	{
		return $value->join('.');
	});

	// Display the collection as an array
	print_r($sorted->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 500.501.502.503.504.505
    [1] => a.b.c.d.e.f.g.h.i.j.k.l.m.n.o.p.q.r.s.t.u.v.w.x.y.z
    [2] => m.n.o.p
    [3] => Z.Y.X.W.V.U.T.S.R.Q.P.O.N.M.L.K.J.I.H.G.F.E.D.C.B.A
)
