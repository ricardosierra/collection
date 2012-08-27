--TEST--
Push and pop a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(range('a', 'z'));

	// Push
	$collection->push('A');
	$collection->push('B');
	$collection->append('C'); # append() is an alias of push()
	echo $collection->join(',') . PHP_EOL;

	echo PHP_EOL;

	// Pop
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo $collection->pop();
	echo PHP_EOL . $collection->join(',');

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,A,B,C

CBAzy
a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x
