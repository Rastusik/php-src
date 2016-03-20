--TEST--
get_class() returns the generic class-name only (not the type arguments)
--FILE--
<?php

class A<T>
{}

class B
{}

var_dump(get_class(new A<B>));

?>
--EXPECT--
string(1) "A"
