--TEST--
Can resolve type argument when used in a method
--FILE--
<?php

class Factory
{
    public function create<T>(): T
    {
        return new T();
    }
}

class A
{}

$factory = new Factory();

var_dump($factory->create<A>() instanceof A); // true

?>
--EXPECT--
bool(true)
