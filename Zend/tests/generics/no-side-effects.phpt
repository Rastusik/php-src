--TEST--
Generic type-hints do not have auto-loading side-effects
--FILE--
<?php

class A<T>
{}

class B
{}

var_dump(new A<B>() instanceof A<B>);
var_dump(new A<NoSuchClass>() instanceof A<NoSuchClass>);

new NoSuchClass();

?>
--EXPECT--
bool(true)
bool(true)
Fatal error: Class 'NoSuchClass' not found
