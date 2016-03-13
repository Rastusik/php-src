--TEST--
Test class identity
--FILE--
<?php

class A<T>
{
	
}

$a1 = new A();
$a2 = new A<string>();

var_dump($a1 instanceof A);
var_dump($a1 instanceof A<string>);
var_dump($a2 instanceof A);
var_dump($a2 instanceof A<string>);

var_dump(get_class($a1));
var_dump(get_class($a2));

var_dump(A::class);
var_dump(A<string>::class);

?>
--EXPECT--
