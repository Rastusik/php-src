--TEST--
Can get method/function type-arguments
--FILE--
<?php

class A<T>
{}

class B
{}

class C
{
	public function accept<T>(T $value)
	{
		$types = func_type_args();

		return $types[0];
	}
}

function accept<T>(T $value)
{
	return func_type_args();
}

$c = new C();

var_dump($c->accept("hello")); // => "string"
var_dump($c->accept(123)); // => "int"
var_dump($c->accept(true)); // => "bool(true)"
var_dump($c->accept(false)); // => "bool(false)"
var_dump($c->accept(new B())); // => "B"
var_dump($c->accept(new A<B>())); // => "A" **

var_dump(accept("hello")); // => "string"
var_dump(accept(123)); // => "int"
var_dump(accept(true)); // => "bool(true)"
var_dump(accept(false)); // => "bool(false)"
var_dump(accept(new B())); // => "B"
var_dump(accept(new A<B>())); // => "A" **

// ** NOTE: func_type_args() returns class-names, consistent with get_class()
//          - if type-arguments are required, one may obtain those via reflection.

?>
--EXPECT--
string(6) "string"
string(3) "int"
bool(true)
bool(false)
string(1) "B"
string(1) "A"
string(6) "string"
string(3) "int"
bool(true)
bool(false)
string(1) "B"
string(1) "A"
