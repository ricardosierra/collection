--TEST--
Apply a callback to each item in a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// each()
	$each_result = $collection->each(function($item, $key)
	{
		$result = strtoupper($item);

		echo $result;
		return $result;
	});
	echo PHP_EOL . $each_result->join(',') . PHP_EOL;

	echo PHP_EOL;

	// map() an collect() are identical
	$map_result = $collection->map(function($item, $key)
	{
		$result = strtoupper($item);

		echo $result;
		return $result;
	});
	echo PHP_EOL . $map_result->join(',') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
ABCDEFGHIJKLMNOPQRSTUVWXYZ
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z

ABCDEFGHIJKLMNOPQRSTUVWXYZ
A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z
