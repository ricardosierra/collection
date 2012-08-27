--TEST--
Shift and unshift a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Unshift
	$collection->unshift('A');
	$collection->unshift('B');
	$collection->prepend('C'); # prepend() is an alias of unshift()
	echo $collection->join(',') . PHP_EOL;

	echo PHP_EOL;

	// Shift
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo $collection->shift();
	echo PHP_EOL . $collection->join(',');

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
C,B,A,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z

CBAab
c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z
