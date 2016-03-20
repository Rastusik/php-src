--TEST--
Can resolve type argument when used in a function
--FILE--
<?php

function create<T>(): T
{
    return new T();
}

class A
{}

var_dump(create<A>() instanceof A); // true

?>
--EXPECT--
bool(true)
