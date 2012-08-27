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
		new Collection(array(
			'key1' => 'value1',
			'key2' => 'value2',
			'key3' => 'value3',
			'key4' => 'value4',
			'key5' => 'value5'
		))
	));

	// Sort the collection, then merge each of the sub-collections into strings
	$sorted = $collection->sort_by(function($value)
	{
		return $value->last;
	})
	->map(function($value)
	{
		return $value->reverse->join('.');
	});

	// Display the collection as an array
	print_r($sorted->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => 505.504.503.502.501.500
    [1] => A.B.C.D.E.F.G.H.I.J.K.L.M.N.O.P.Q.R.S.T.U.V.W.X.Y.Z
    [2] => value5.value4.value3.value2.value1
    [3] => z.y.x.w.v.u.t.s.r.q.p.o.n.m.l.k.j.i.h.g.f.e.d.c.b.a
)
