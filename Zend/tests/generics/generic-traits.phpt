--TEST--
Can parse generic traits and generic use-clauses
--FILE--
<?php

trait A<T>
{}

class B
{}

class C
{
    use A<B>
}

?>
--EXPECT--
