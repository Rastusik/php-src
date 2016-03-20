--TEST--
Can implement generic interfaces
--FILE--
<?php

interface I<T>
{}

class A<T> implements I<T>
{}

class B
{}

class AB extends A<B>
{}

var_dump(new A<B> instanceof I); // true
var_dump(new A<B> instanceof I<B>); // true
var_dump(new AB() instanceof I); // true
var_dump(new AB() instanceof I<B>); // true
var_dump(new AB() instanceof B); // false

?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(false)
