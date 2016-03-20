--TEST--
Can parse generic class declarations
--FILE--
<?php

class A<T>
{
	public function __construct(T $x)
 	{}
}

class B<X, Y>
{
	public function __construct(X $x, Y $y)
	{}
}

?>
--EXPECT--
