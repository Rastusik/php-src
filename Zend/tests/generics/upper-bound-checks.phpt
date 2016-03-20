--TEST--
Can check upper bounds
--FILE--
<?php

class A
{}

class AA extends A
{}

class B<T is A>
{}

interface I
{}

class II implements I
{}

class C<T is I>
{}

class D
{}

// NOTE: currently no tests with scalar type-constraints, since these would be useless, as we
// do not (at least for the time being) support any meta-types such as "scalar" or "number"

var_dump(new B<A>());
var_dump(new B<AA>());

try {
    new B<D>();
} catch (Exception $e) {
    var_dump(true);
}

var_dump(new C<II>());

try {
    new C<D>();
} catch (Exception $e) {
    var_dump(true);
}

?>
--EXPECTF--
object(B<A>)#%d (%d) {
}
object(B<AA>)#%d (%d) {
}
bool(true)
object(C<II>)#%d (%d) {
}
bool(true)
