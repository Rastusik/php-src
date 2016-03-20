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
--EXPECTF--
object(A<B>)#%d (%d) {
}
