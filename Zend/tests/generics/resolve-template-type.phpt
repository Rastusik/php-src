--TEST--
Can resolve a template type when used in a method body
--FILE--
<?php

class Factory<T>
{
	public function create(): T
	{
		return new T();
	}
}

class A
{}

$factory = new Factory<A>();

var_dump($factory->create() instanceof A); // true

?>
--EXPECT--
bool(true)
