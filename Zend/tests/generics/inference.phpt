--TEST--
Test inference
--FILE--
<?php

// I'm still not sold on this idea though.

class A<X, Y>
{
	public function __construct(X $x, Y $y = null)
	{

	}
}

$a1 = new A('Hello,', 'World');
$a2 = new A('Hello,');

var_dump($a1 instaneof A<string, string>);
var_dump(get_class($a1));

var_dump($a2 instaneof A<string, mixed>);
var_dump(get_class($a2));

?>
--EXPECT--
