--TEST--
Can type-check generic objects
--FILE--
<?php

class A<T>
{}

class B
{}

class C
{}

var_dump(new A<B>() instanceof A); // true
var_dump(new A<B>() instanceof A<B>); // true
var_dump(new A<B>() instanceof A<C>); // false

?>
--EXPECT--
bool(true)
bool(true)
bool(false)
