--TEST--
Test class identity
--FILE--
<?php

class A<T>
{
	public function doWork(): T
	{
		return new T();
	}
}

$a = new A<DateTime>();
$d = $a->doWork();

var_dump($d instanceof DateTime);
var_dump(get_class($d));

?>
--EXPECT--
