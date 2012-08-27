--TEST--
Collection to string.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Generic\Enum,
	    AWS\Common\Reflection\Klass,
	    AWS\Common\Util\Fn;

	class ABCEnumerable extends Enum
	{
		const ALPHA = 'a';
		const BETA = 'b';
		const DELTA = 'c';
	}

	class WinterEnumerable extends Enum
	{
		const SPRING = 'March';
		const SUMMER = 'June';
		const FALL = 'September';
		const AUTUMN = self::FALL;
		const WINTER = 'December';
	}

	// Collection of various types
	$collection = new Collection(array(
		'abcdef',
		123456,
		3.14159,
		true,
		false,
		array('Even', 'Odd'),
		array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
		new Collection(),
		new Collection(array('John', 'Paul', 'George', 'Ringo')),
		new Collection(array('Larry', 'Moe', 'Curly')),
		new ABCEnumerable(),
		new WinterEnumerable(),
		new ArrayObject(array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')),
		Collection::factory()->reflect,
		new Klass(new ReflectionObject(new stdClass())),
		Fn::execute(function()
		{
			$xml = simplexml_load_string('<root/>');
			$xml->addChild('parent')->addChild('child', 'value');
			return $xml;
		}),
	));

	echo $collection->to_string;

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECT--
contents:
  [0] => <string:6> "abcdef"
  [1] => <integer> 123456
  [2] => <double> 3.14159
  [3] => <boolean> true
  [4] => <boolean> false
  [5] => <array:2> [Even, Odd]
  [6] => <array:12> [January, February, March, ...]
  [7] => <AWS\Common\Generic\Collection:0> []
  [8] => <AWS\Common\Generic\Collection:4> [John, Paul, George, ...]
  [9] => <AWS\Common\Generic\Collection:3> [Larry, Moe, Curly]
  [10] => <ABCEnumerable:3> [ALPHA, BETA, DELTA]
  [11] => <WinterEnumerable:5> [SPRING, SUMMER, FALL, ...]
  [12] => <ArrayObject:7> [Sunday, Monday, Tuesday, ...]
  [13] => <AWS\Common\Reflection\Klass> AWS\Common\Generic\Collection
  [14] => <AWS\Common\Reflection\Klass> stdClass
  [15] => <SimpleXMLElement>
