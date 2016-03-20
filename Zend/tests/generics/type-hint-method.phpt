--TEST--
Can check generic type-hints in methods
--FILE--
<?php

class A<T>
{}

class B
{}

class C
{
    public function acceptA(A $a)
    {
        return true;
    }

    public function acceptAB(A<B> $ab)
    {
        return true;
    }
}

class D
{}

$c = new C();

var_dump($c->acceptA(new A<B>)); // true
var_dump($c->acceptAB(new A<B>)); // true

$c->acceptAB(new A<D>()); // fatal error

?>
--EXPECTF--
bool(true)
bool(true)
Catchable fatal error: Argument 1 passed to C::acceptAB() must be an instance of A<B>, instance of A<D> given, called in %s on line %d and defined in %s on line %d
