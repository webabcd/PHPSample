<?php
/**
 * 运算符，表达式，控制语句
 */

// 运算符，表达式，控制语句和其他的语言都差不多
// 以下写一些个人认为需要强调的东西

// . 字符串运算符
$s1 = "hello ";
$s2 = "webabcd";
$s3 = $s1 . $s2;
echo $s3; // output: hello webabcd
echo "<br />";

$s1 .= "wanglei"; // output: hello wanglei
echo $s1;
echo "<br />";


// == 和 === 的区别
$a1 = "1"; // 字符串
$b1 = 1; // 整型
$c1 = "1"; // 字符串
if ($a1 == $b1) // 两个不同类型的数据做 == 比较，系统会自动转换
{
    echo '$a1 == $b1'; // output: $a1 == $b1
    echo "<br />";
}
if ($a1 === $b1) // 两个不同类型的数据做 === 比较，系统不会自动转换
{
    // 不成立
}
if ($a1 === $c1)
{
    echo '$a1 === $c1'; // output: $a1 === $c1
    echo "<br />";
}


// 对于 {} 方式的或者省略了 {} 方式的 if/else 语句来说，elseif 和 else if 是一样的
if (1 == 2)
    echo "1 == 2";
else if (1 == 1)
    echo "1 == 1";
elseif (2 == 2)
    echo "2 == 2";
else
    echo "else";
echo "<br />";

// 对于 : 方式的 if/else 语句来说，只能用 elseif 而不用能 else if
if (1 == 2):
    echo "1 == 2";
// else if (1 == 1):
  //  echo "1 == 1";
elseif (2 == 2):
    echo "2 == 2";
else:
    echo "else";
endif;
echo "<br />";


// foreach 语句的用法
$array1 = array(1, 2, 3, 4);
foreach ($array1 as $value)
{
    echo $value;
    echo "<br />";
}
foreach ($array1 as $key => $value)
{
    echo $key . " - " . $value;
    echo "<br />";
}


// try catch finally 的用法
try
{
    echo "try";
    echo "<br />";

    throw new Exception("error message", 999); // 要想写自定义的 Exception 的话，就继承 Exception 就好
}
catch (Exception $ex)
{
    echo "catch";
    echo "<br />";

    echo sprintf("message: %s, code: %d, file: %s, line: %d, trace: %s", $ex->getMessage(), $ex->getCode(), $ex->getFile(), $ex->getLine(), $ex->getTraceAsString());
    echo "<br />";
}
finally
{
    echo "finally";
    echo "<br />";
}