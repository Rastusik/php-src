--TEST--
Test class declarations
--FILE--
<?php

class A
{
	public function doWork<T>(T $v): T
 	{
 		return $v;
 	}
}	

function doWork<T>(T $v): T
{
	return $v;
}

?>
--EXPECT--
