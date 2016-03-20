--TEST--
Can compose classes with generic traits
--FILE--
<?php

interface Flavor
{}

class Drink {
    public $flavor;

    public function __construct(Flavor $flavor)
    {
        $this->flavor = $flavor;
    }
}

class Tea extends Drink
{}

class Coffee extends Drink
{}

class Milk implements Flavor
{}

class Sugar implements Flavor
{}

trait Factory<D is Drink, F is Flavor>
{
    public function make(F $flavor) : D {
        return new D($flavor);
    }
}

class Maker
{
    // NOTE: F defaults to the upper bound Flavor in both of these use-clauses
    use Factory<Tea> {
        make as makeTea;
    }
    use Factory<Coffee> {
        make as makeCoffee;
    }
}

$maker = new Maker();

var_dump($maker->makeTea(new Sugar()) instanceof Tea);
var_dump($maker->makeTea(new Sugar())->flavor instanceof Sugar);
var_dump($maker->makeCoffee(new Milk()) instanceof Coffee);
var_dump($maker->makeCoffee(new Milk())->flavor instanceof Milk);

?>
--EXPECT--
bool(true)
bool(true)
bool(true)
bool(true)
