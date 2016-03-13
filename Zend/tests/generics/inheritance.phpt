--TEST--
Test class declarations
--FILE--
<?php

interface IBase<T>
{
	public function doWork(T $v): T;
}

class A<T> implements IBase<T>
{
	public function doWork(T $v): T
	{
		return $v;
	}
}


interface AbstractBase<T>
{
	public function doWork(T $v): T
	{
		return $v;
	}
}

class B<T> extends AbstractBase<T>
{
	
}

?>
--EXPECT--
