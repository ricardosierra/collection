--TEST--
Group collection items using a callback.

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

	$result = $collection->group_by(function($item, $key)
	{
		return $item->status;
	})
	->get('TERMINATED')
	->to_array(true);

	print_r($result);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
Array
(
    [0] => MyItem Object
        (
            [id] => id_04
            [status] => TERMINATED
        )

    [1] => MyItem Object
        (
            [id] => id_07
            [status] => TERMINATED
        )

    [2] => MyItem Object
        (
            [id] => id_09
            [status] => TERMINATED
        )

    [3] => MyItem Object
        (
            [id] => id_10
            [status] => TERMINATED
        )

)
