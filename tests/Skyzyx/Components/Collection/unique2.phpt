--TEST--
Remove all duplicate items from a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	$collection->unshift('x')
	           ->unshift('y')
	           ->unshift('z')
	           ->push('a')
	           ->push('b')
	           ->push('c');

	echo $collection->join(',') . PHP_EOL;

	$collection->uniq();

	echo $collection->join(',') . PHP_EOL;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
z,y,x,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,a,b,c
z,y,x,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w
