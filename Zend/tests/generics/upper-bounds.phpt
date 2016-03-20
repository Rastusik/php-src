--TEST--
Can parse upper bounds
--FILE--
<?php

class A
{}

class B<T is A>
{}

?>
--EXPECT--
