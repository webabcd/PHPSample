<?php
/**
 * 函数的相关知识点 2（函数参数）
 */

// 带参数的函数
f1("webabcd");
function f1($name)
{
    echo "hello " . $name; // output: hello webabcd
    echo "<br />";
}


// 带参数的函数（参数是引用类型）
$name = "webabcd";
f2($name);
function f2(&$n) // 参数是引用类型
{
    echo "hello " . $n; // output: hello webabcd
    echo "<br />";

    $n = "wanglei"; // $n 是引用类型，其与全局变量 $name 指向的内容是一样的
}
echo "hello " . $name; // output: hello wanglei
echo "<br />";


// 带参数的函数（参数可以指定默认值）
f3("hello "); // output: hello webabcd
f3("hello ", "wanglei"); // output: hello wanglei
function f3($p1, $p2 = "webabcd") // 参数的默认值只能是常量，不能是表达式
{
    echo $p1 . $p2;
    echo "<br />";
}