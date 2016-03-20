--TEST--
Can extend generic classes
--FILE--
<?php

class A<T>
{}

class B
{}

class AB extends A<B>
{}

var_dump(new AB() instanceof A); // true
var_dump(new AB() instanceof A<B>); // true
var_dump(new AB() instanceof B); // false

?>
--EXPECT--
bool(true)
bool(true)
bool(false)
