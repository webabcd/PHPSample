<?php
/**
 * 变量
 */

// 通过 $ 定义变量
$a = "a";

// 通过 $ 使用变量
echo $a;  // output: a
echo "<br />";

// 通过 $ 使用变量，即使外面加了双引号也同样会使用变量
echo "$a"; // output: a
echo "<br />";

// 通过 {} 界定变量名称，比如"$ab"，php会使用变量$ab，而实际上我们想要使用的是$a，此时就可以通过 {} 来界定变量名称，如下：
echo "{$a}b"; // output: ab
echo "<br />";

// 外面加双引号，但是不想使用变量的话，可以通过转移符“\”来将“$”变成字符串
echo "\$a"; // output: $a
echo "<br />";

// 外面加单引号的话就按字符串处理了
echo '$a'; // output: $a
echo "<br />";



// 变量之间赋值
$b = $a;
// 通过 & 定义引用。下面的例子是让 $c 引用 $a
$c = &$a;
// 为 $a 重新赋值
$a = "aa";
echo "$b"; // output: a
echo "<br />";
echo "$c"; // output: aa
echo "<br />";



function f1()
{
    // 这里的 $a 引用的是局部变量 $a，然而之前在 f1 这个局部范围内并没有定义 $a，所以你要使用 $a 的话它是不会有任何内容的
    echo $a; // output:
    echo "<br />";
}
f1();

function f2()
{
    // 通过 global 关键字标记 $a，则在此局部范围之后，再使用 $a 时将会使用全局版本的 $a
    global $a;
    echo $a; // output: aa
    echo "<br />";
}
f2();

function f3()
{
    // 通过 $GLOBALS 直接使用指定变量的全局版本
    echo $GLOBALS['a']; // output: aa
    echo "<br />";
}
f3();

function f4()
{
    // 通过 static 来定义静态变量，其常驻内存
    static $i = 0;
    echo $i;
    echo "<br />";

    $i++;
}
f4(); // output: 0
f4(); // output: 1
f4(); // output: 2


$x = "aaa";
// variable variables（可变变量），将变量的值作为变量名
// 下面这句等同于 $aaa = "bbb";（因为 $x 的值是 aaa，所以 $$x 等同于 $aaa）
$$x = "bbb";
echo $aaa; // output: bbb
echo "<br />";
echo $$x; // output: bbb
echo "<br />";



$s = "12345";
// 大括号的作用: 用于指示字符串变量中的单个字符（下标从 0 开始）
$s{1} = 'x';
echo $s; // output: 1x345
echo "<br />";
// 大括号的作用: 用于界定变量的名称（比如下面使用的变量是 $s，而不是 $ss）
echo "{$s}s"; // output: 1x345s
echo "<br />";