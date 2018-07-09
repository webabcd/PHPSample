<?php
/**
 * 类的相关知识点 3（动态地创建属性和方法）
 */

// 用于演示如何动态地创建属性（这就是 php 中所谓的重载）
class Class1
{
    // __set 魔术方法，当设置的属性不存在或者不可访问（private）时就会调用此函数
    public function __set($name, $value)
    {
        echo "__set \$name: {$name}, \$value: {$value}";
        echo "<br />";
    }

    // __get 魔术方法，当获取的属性不存在或者不可访问（private）时就会调用此函数
    public function __get($name)
    {
        echo "__get \$name: {$name}";
        echo "<br />";

        return 999;
    }
}

$objClass1 = new Class1();
// 当你设置的属性不存在或者不可访问（private）时，就会调用对应的 __set 魔术方法
$objClass1->property1 = wanglei; // 不可访问的如 private ，或者不存在的

// 当你获取的属性不存在或者不可访问（private）时，就会调用对应的 __get 魔术方法
echo $objClass1->property2;
echo "<br />";



// 用于演示如何动态地创建方法（这就是 php 中所谓的重载）
class Class2
{
    // __call 魔术方法，当调用的实例方法不存在或者不可访问（private）时就会调用此函数
    public function __call($name, $arguments)
    {
        echo "__call \$name: {$name}, \$arguments: " . implode(', ', $arguments);
        echo "<br />";
    }

    // __callStatic 魔术方法，当调用的类方法不存在或者不可访问（private）时就会调用此函数
    public static function __callStatic($name, $arguments)
    {
        echo "__callStatic \$name: {$name}, \$arguments: " . implode(', ', $arguments);
        echo "<br />";
    }
}

$objClass2 = new Class2();

// 当你调用的实例方法不存在或者不可访问（private）时，就会调用对应的 __call 魔术方法
echo $objClass2->method1("aaa", "bbb");

// 当你调用的类方法不存在或者不可访问（private）时，就会调用对应的 __callStatic 魔术方法
echo Class2::method2("aaa", "bbb");