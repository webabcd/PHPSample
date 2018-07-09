<?php
/**
 * 函数的相关知识点 4（可变函数，匿名函数，闭包函数）
 */

// variable function（可变函数），将变量的值作为函数名
function f1()
{
    echo "f1"; // output: f1
    echo "<br />";
}
function f2()
{
    echo "f2"; // output: f2
    echo "<br />";
}
$func = 'f1';
$func();
$func = 'f2';
$func();


// 匿名函数
echo preg_replace_callback // output: userName
(
    '~-([a-z])~',
    function ($match) // 匿名函数
    {
        return strtoupper($match[1]);
    },
    'user-name'
);


// 闭包函数
// $f3("webabcd"); // 这是错误的，对于闭包函数来说，调用时要在声明语句的后面
$f3 = function($name)
{
    echo "hello " . $name; // output: hello webabcd
    echo "<br />";
}; // 别忘了闭包函数的“;”
$f3("webabcd");