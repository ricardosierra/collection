--TEST--
Serialize and unserialize a collection.

--FILE--
<?php
	// Dependencies
	require_once substr(__FILE__, 0, strrpos(__FILE__, '/tests/')) . '/src/bootstrap.php';

	// Include namespaces
	use AWS\Common\Generic\Collection,
	    AWS\Common\Util\Fn;

	// Custom class to extend SimpleXMLElement
	class MySimpleXML extends SimpleXMLElement {}

	$collection = new Collection(array(
		'abcdef',
		123456,
		3.14159,
		true,
		false,
		array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
		new AWS\Common\Generic\Collection(array('John', 'Paul', 'George', 'Ringo')),
		new AWS\Common\Generic\Enum(),
		new ArrayObject(array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday')),
		Fn::execute(function()
		{
			$xml = simplexml_load_string('<root/>', 'MySimpleXML');
			$xml->addChild('parent')->addChild('child', 'value');
			return $xml;
		}),
	));

	// Serialize the collection
	$serialized_string = serialize($collection);
	echo implode(PHP_EOL, str_split($serialized_string, 80));

	echo PHP_EOL . PHP_EOL;

	// Unserialize the collection
	$string = unserialize($serialized_string);
	print_r($string->to_array);

	/*#block:["Dependencies", "require_once", "set_time_limit", "Test::log"]*/
?>

--EXPECTF--
C:29:"AWS\Common\Generic\Collection":822:{C:11:"ArrayObject":797:{x:i:2;a:10:{i:
0;s:6:"abcdef";i:1;i:123456;i:2;d:3.1415899999999999;i:3;b:1;i:4;b:0;i:5;a:12:{i
:0;s:7:"January";i:1;s:8:"February";i:2;s:5:"March";i:3;s:5:"April";i:4;s:3:"May
";i:5;s:4:"June";i:6;s:4:"July";i:7;s:6:"August";i:8;s:9:"September";i:9;s:7:"Oc
tober";i:10;s:8:"November";i:11;s:8:"December";}i:6;C:29:"AWS\Common\Generic\Col
lection":108:{C:11:"ArrayObject":84:{x:i:2;a:4:{i:0;s:4:"John";i:1;s:4:"Paul";i:
2;s:6:"George";i:3;s:5:"Ringo";};m:a:0:{}}}i:7;O:23:"AWS\Common\Generic\Enum":0:
{}i:8;C:11:"ArrayObject":148:{x:i:0;a:7:{i:0;s:6:"Sunday";i:1;s:6:"Monday";i:2;s
:7:"Tuesday";i:3;s:9:"Wednesday";i:4;s:8:"Thursday";i:5;s:6:"Friday";i:6;s:8:"Sa
turday";};m:a:0:{}}i:9;s:101:"&SimpleXMLElement&MySimpleXML&<?xml version="1.0"?
><root><parent><child>value</child></parent></root>";};m:a:0:{}}}

Array
(
    [0] => abcdef
    [1] => 123456
    [2] => 3.14159
    [3] => 1
    [4] =>%s
    [5] => Array
        (
            [0] => January
            [1] => February
            [2] => March
            [3] => April
            [4] => May
            [5] => June
            [6] => July
            [7] => August
            [8] => September
            [9] => October
            [10] => November
            [11] => December
        )

    [6] => AWS\Common\Generic\Collection Object
        (
            [collection:AWS\Common\Generic\Collection:private] => ArrayObject Object
                (
                    [storage:ArrayObject:private] => Array
                        (
                            [0] => John
                            [1] => Paul
                            [2] => George
                            [3] => Ringo
                        )

                )

            [iterator:AWS\Common\Generic\Collection:private] => ArrayIterator Object
                (
                    [storage:ArrayIterator:private] => ArrayObject Object
                        (
                            [storage:ArrayObject:private] => Array
                                (
                                    [0] => John
                                    [1] => Paul
                                    [2] => George
                                    [3] => Ringo
                                )

                        )

                )

        )

    [7] => AWS\Common\Generic\Enum Object
        (
        )

    [8] => ArrayObject Object
        (
            [storage:ArrayObject:private] => Array
                (
                    [0] => Sunday
                    [1] => Monday
                    [2] => Tuesday
                    [3] => Wednesday
                    [4] => Thursday
                    [5] => Friday
                    [6] => Saturday
                )

        )

    [9] => MySimpleXML Object
        (
            [parent] => MySimpleXML Object
                (
                    [child] => value
                )

        )

)
