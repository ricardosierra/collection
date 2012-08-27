--TEST--
Merge multiple collections into the current collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection;

	$collection = new Collection(array(
		'Winter' => 'December',
		'Spring' => 'March',
		'Summer' => 'June',
		'Autumn' => 'September'
	));

	$mergable = new Collection(array(
		'John' => array('Vox', 'Guitar'),
		'Paul' => array('Vox', 'Bass'),
		'George' => 'Guitar',
		'Ringo' => 'Drums'
	));

	$merged_collection = $collection->merge($mergable)->to_array;

	print_r($merged_collection);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [Winter] => December
    [Spring] => March
    [Summer] => June
    [Autumn] => September
    [John] => Array
        (
            [0] => Vox
            [1] => Guitar
        )

    [Paul] => Array
        (
            [0] => Vox
            [1] => Bass
        )

    [George] => Guitar
    [Ringo] => Drums
)
