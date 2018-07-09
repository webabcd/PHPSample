<?php
/**
 * 函数的相关知识点 3（函数返回值）
 */

// 带返回值的函数
$result1 = f1("webabcd");
echo $result1;
echo "<br />";
function f1($name)
{
    return "hello " . $name; // output: hello webabcd
}


// 从函数返回以一个引用（函数的声明和调用都要加 &）
$result2 = &f2();
echo $result2;  // output: 1
echo "<br />";
$result2 = 100; // $result2 是个引用，指向 $i 所指向的内容，所以此句之后 $i 的值为 100
$result3 = &f2();
echo $result3;  // output: 101
echo "<br />";
function &f2() // 此函数会返回一个引用（函数的声明和调用都要加 &）
{
    static $i = 0;
    $i ++;

    return $i;
}