--TEST--
Can construct generic objects
--FILE--
<?php

class A<T>
{}

class B
{}

var_dump(new A<B>());

?>
--EXPECT--
object(A<B>)#1 (0) {
}
