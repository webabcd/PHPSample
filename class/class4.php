<?php
/**
 * 类的相关知识点 4（对象的复制，对象的比较）
 */

// 用于演示如何复制对象
class Class1
{
    public $field1 = "field1";
    public $field2 = "field2";

    // 通过 clone 复制对象时，会调用此魔术方法
    function __clone()
    {
        echo "__clone";
        echo "<br />";
    }
}

$objClass1 = new Class1();
// 通过 clone 复制对象，会调用 __clone 魔术方法
$objClass2 = clone $objClass1;

// 通过 clone 复制的对象为浅拷贝（shallow copy），即成员数据之间的一一赋值, 而所有的引用属性仍然会是一个指向原来的变量的引用（如果要做 deep copy 则需要自己写）
echo $objClass2->field1; // output: field1
echo "<br />";
echo $objClass2->field2; // output: field2
echo "<br />";



// 如果两个对象的属性和属性值都相等，则他们“==”相等，
if ($objClass1 == $objClass2)
{
    echo '$objClass1 == $objClass2';
    echo "<br />";
}

// 如果两个对象的属性和属性值都相等，但不是同一个类的实例，则他们“===”不相等
if ($objClass1 !== $objClass2)
{
    echo '$objClass1 !== $objClass2';
    echo "<br />";
}

// 如果两个对象是同一个类的实例，则他们“===”相等
if ($objClass1 === $objClass1)
{
    echo '$objClass1 === $objClass1';
    echo "<br />";
}

// 如果两个对象是同一个类的实例，则他们“===”相等
$objClass3 = &$objClass1;
if ($objClass1 === $objClass3)
{
    echo '$objClass1 === $objClass3';
    echo "<br />";
}
