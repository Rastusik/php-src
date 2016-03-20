--TEST--
Can check generic type-hints in function
--FILE--
<?php

class A<T>
{}

class B
{}

function acceptA(A $a)
{
    return true;
}

function acceptAB(A<B> $ab)
{
    return true;
}

class D
{}

$c = new C();

var_dump(acceptA(new A<B>)); // true
var_dump(acceptAB(new A<B>)); // true

acceptAB(new A<D>()); // fatal error

?>
--EXPECTF--
bool(true)
bool(true)
Catchable fatal error: Argument 1 passed to acceptAB() must be an instance of A<B>, instance of A<D> given, called in %s on line %d and defined in %s on line %d
