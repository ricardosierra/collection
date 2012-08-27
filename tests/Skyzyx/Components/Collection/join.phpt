--TEST--
Join the elements of a collection together as a string.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Aliases
	echo $collection->join(',') . PHP_EOL;
	echo $collection->implode(',') . PHP_EOL;
	echo $collection->concat(',') . PHP_EOL;

	// Using a callback as the final parameter
	echo $collection->join(function($letter)
	{
		return strtoupper($letter);
	})
	. PHP_EOL;

	// Using a delimiter + callback
	echo $collection->join(',', function($letter)
	{
		return strtoupper($letter);
	});

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
ABCDEFGHIJKLMNOPQRSTUVWXYZ
A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z
