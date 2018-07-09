<?php
/**
 * 函数的相关知识点 1（基础）
 */

// 可以在相关的 function 声明语句之前调用该函数
f1();
function f1()
{
    echo "f1";
    echo "<br />";
}


// 这里调用 f2() 就错误了
// f2();
$b = true;
if ($b)
{
    function f2() // 条件成立才会声明此函数
    {
        echo "f2";
        echo "<br />";
    }
}
f2();


// 这里调用 f4() 就错误了（因为 f4 的声明是在 f3 的内部，所以要先调用 f3 才能再调用 f4）
// f4();
f3();
f4();
function f3()
{
    echo "f3";
    echo "<br />";

    function f4()
    {
        echo "f4";
        echo "<br />";
    }
}