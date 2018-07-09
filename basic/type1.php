<?php
/**
 * 数据类型: bool, int, float, string, object
 */

// 布尔类型（true, false 不分大小写）
$b = true;
if ($b)
{
    echo "true";
    echo "<br />";
}
$b = false;
if (!$b)
{
    echo "false";
    echo "<br />";
}


// 整型
$i = 100;
echo $i;
echo "<br />";
// 八进制（以 0 开头）
$i = 0144; // 等于十进制的 100
echo $i;
echo "<br />";
// 十六进制（以 0x 开头）
$i = 0x64; // 等于十进制的 100
echo $i;
echo "<br />";


// 浮点型
$f = 3.14;
echo $f;
echo "<br />";
if (!is_nan($f)) // 通过 is_nan 函数来判断一个变量的值是否不是数字类型
{
    echo $f;
    echo "<br />";
}
if ($f == 1.11 + 2.03) // false
{
    echo "注意不要用 == 来比较两个浮点型变量";
    echo "<br />";
}
if (bccomp($f, 1.11 + 2.03, 2) == 0) // true
{
    echo "请用 bccomp 函数来比较两个浮点型变量";
    echo "<br />";
}


// 字符串类型
$s = 'abc$i\$';
echo $s; // output: abc$i\$
echo "<br />";
$s = "abc$i\$";
echo $s; // output: abc100$
echo "<br />";
if (is_string($s)) // 通过 is_string 函数来判断一个变量的值是否是字符串类型
{
    echo "$s 是字符串";
    echo "<br />";
}

// 字符串的格式化输出
$s = sprintf("string: %s, int: %d", "xyz", 100);
echo $s;
echo "<br />";

// heredoc 结构（通过“<<<标识符”和“标识符”包围起来，中间包围的就是字符串内容，变量和转移符会被解析）
$h = <<<XXX
echo $s;
\\
XXX;
echo $h;
echo "<br />";
/*
上面 echo $h; 输出的内容如下：
echo abc100$;
\
*/

// nowdoc 结构（通过“<<<'标识符'”和“标识符”包围起来，中间包围的就是字符串内容，变量和转移符不会被解析）
$n = <<<'YYY'
echo $s;
\\
YYY;
echo $n;
echo "<br />";
/*
上面 echo $n; 输出的内容如下：
echo $s;
\\
*/


// object 类型
$obj = (object)"sss"; // 将一个变量转换为对象时，系统会创建一个内置类，该类的 scalar 属性即为原变量的值
echo $obj->scalar; // output: sss
echo "<br />";


// NULL 类型（NULL 不分大小写）
$n1; // 未赋值则为 null
$n2 = NULL;
if ($n1 == null)
{
    echo "null"; // output: null
    echo "<br />";
}
if ($n2 == null)
{
    echo "null"; // output: null
    echo "<br />";
}


/*
 * 数据类型间的显示转换
 * (int)
 * (bool)
 * (float)
 * (string)
 * (array)
 * (object)
 */

// 数据类型间的隐式转换
$v = "1"; // 字符串类型
echo $v; // output: 1
echo "<br />";
$v = 2 + $v; // 隐式转换为整型
echo $v; // output: 3
echo "<br />";