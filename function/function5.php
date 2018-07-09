<?php
/**
 * 函数的相关知识点 5（回调函数）
 */

// 用于演示如何回调（callback）函数
function myCallbackFunction()
{
    return 'myCallbackFunction';
}

class MyClass1
{
    // 用于演示如何回调（callback）实例方法
    public function myMethod1()
    {
        echo 'MyClass1 myMethod1';
        echo '<br />';
    }

    // 用于演示如何回调（callback）类方法
    public static function myMethod2()
    {
        echo 'MyClass1 myMethod2';
        echo '<br />';
    }
}

// 通过 call_user_func 调用指定的函数
echo call_user_func('myCallbackFunction');
echo '<br />';

$obj1 = new MyClass1();
// 通过 call_user_func 调用指定对象的指定方法
call_user_func(array($obj1, 'myMethod1'));

// 通过 call_user_func 调用指类的类方法
call_user_func(array('MyClass1', 'myMethod2'));

// 通过 call_user_func 调用指类的类方法（PHP 5.2.3 或以上）
call_user_func('MyClass1::myMethod2');
