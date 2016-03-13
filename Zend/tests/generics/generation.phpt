--TEST--
Test class identity
--FILE--
<?php

class B<T>
{
	public $v;

	public function __construct(T $v)
	{
		$this->v = $v;
	}
}

class A<T>
{
	public function doWork(T $v): B<T>
	{
		return new B<T>($v);
	}
}

$a = new A<string>();
$b = $a->doWork('Hello, World!');

var_dump($b instanceof B<string>);
var_dump(get_class($b));

var_dump($b->v);

?>
--EXPECT--
