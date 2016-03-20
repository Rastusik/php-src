--TEST--
Can infer type-arguments of generic constructors
--FILE--
<?php

class A<T>
{
	public function __construct<T>(T $value)
	{}
}

class B
{}

var_dump(new A("hello") instanceof A<string>); // true
var_dump(new A(123) instanceof A<int>); // true
var_dump(new A(123.456) instanceof A<float>); // true
var_dump(new A(true) instanceof A<bool>); // true
var_dump(new A(false) instanceof A<bool>); // true
var_dump(new A(new B()) instanceof A<B>); // true
var_dump(new A(null) instanceof A); // true
// var_dump(new A(null) instanceof A<mixed>); // true ("mixed" is currently unsupported as a type-hint)

?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
bool(true)
