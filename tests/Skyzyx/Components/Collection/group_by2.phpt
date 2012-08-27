--TEST--
Group collection items by a specific parameter.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Resource;

	// Create custom class
	class MyItem extends Resource
	{
		public $id;
		public $status;

		public function __construct($id, $status)
		{
			$this->id = $id;
			$this->status = $status;
		}

		public function status()
		{
			return $this->status;
		}
	}

	$collection = new Collection(array(
		new MyItem('id_01', 'AVAILABLE'),
		new MyItem('id_02', 'STARTING-UP'),
		new MyItem('id_03', 'STOPPING'),
		new MyItem('id_04', 'TERMINATED'),
		new MyItem('id_05', 'STARTING-UP'),
		new MyItem('id_06', 'STOPPING'),
		new MyItem('id_07', 'TERMINATED'),
		new MyItem('id_08', 'STOPPING'),
		new MyItem('id_09', 'TERMINATED'),
		new MyItem('id_10', 'TERMINATED'),
		new MyItem('id_11', 'AVAILABLE'),
		new MyItem('id_12', 'STARTING-UP'),
		new MyItem('id_13', 'STOPPING'),
	));

	// Names that are property-friendly (e.g., "AVAILABLE") can be accessed directly.
	print_r($collection->group_by('status')->AVAILABLE->to_array);

	// Names that are NOT property-friendly (e.g., "STARTING-UP") can be accessed with `get()`.
	print_r($collection->group_by('status')->get('STARTING-UP')->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => MyItem Object
        (
            [id] => id_01
            [status] => AVAILABLE
        )

    [1] => MyItem Object
        (
            [id] => id_11
            [status] => AVAILABLE
        )

)
Array
(
    [0] => MyItem Object
        (
            [id] => id_02
            [status] => STARTING-UP
        )

    [1] => MyItem Object
        (
            [id] => id_05
            [status] => STARTING-UP
        )

    [2] => MyItem Object
        (
            [id] => id_12
            [status] => STARTING-UP
        )

)
