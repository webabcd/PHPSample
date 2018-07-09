<?php
/**
 * 数据类型: array
 */

// 定义数组（数组中的 key 索引为从 0 开始的递增的整型）
$array0 = array(1, 2, 3, 4);
var_dump($array0);

// 定义数组
$array1 = array
(
    "a" => "abx",
    "x" => "xyz",
);
var_dump($array1);

// 在 php 5.4 之后可以通过 [] 定义数组
$array2 =
[
    "a" => "abx",
    "x" => "xyz",
];
var_dump($array2);

// key 是 integer 类型或 string 类型，如果是其他类型的话会被自动转换为 integer 类型或 string 类型
// key 可以 integer 和 string 两种类型混合存在
// key 为可选项，如果未指定的话，则 PHP 将自动使用之前用过的最大 integer 键名加上 1 作为新的键名，如果没有则从 0 开始
$array3 = array
(
    "a" => "abc",
    "x" => "xyz",
    100 => "111",
    100.99 => "222",
    1 => "333",
    true => "444",
    "a",
    "b",
    "c"
);
var_dump($array3);
/*
 * 上面数组定义的结果如下：
 * 'a' => string 'abc'
 * 'x' => string 'xyz'
 * 100 => string '222'
 * 1 => string '444'
 * 101 => string 'a'
 * 102 => string 'b'
 * 103 => string 'c'
 */

// 通过 [] 指定数组字符串类型的 key 并获取其值
echo $array3["a"]; // output: abc
echo "<br />";
// 通过 {} 指定数组字符串类型的 key 并获取其值
echo $array3{"a"}; // output: abc
echo "<br />";
// 通过 [] 指定数组整型类型的 key 并获取其值（注：这里不是指位置 100 的元素，而是指 key 为 100 的元素）
echo $array3[100]; // output: 222
echo "<br />";
// 通过 {} 指定数组整型类型的 key 并获取其值（注：这里不是指位置 100 的元素，而是指 key 为 100 的元素）
echo $array3{100}; // output: 222
echo "<br />";

// 修改数组中指定 key 的值
$array3["a"] = "aaa";
echo $array3["a"]; // output: aaa
echo "<br />";
// 通过 key 和 value 为数组添加新元素（在数据最后一个元素的后面添加）
$array3[50] = "d";
echo $array3[50]; // output: d
echo "<br />";
// 仅通过 value 为数组添加新元素（在数据最后一个元素的后面添加），key 值将自动使用之前用过的最大 integer 键名加上 1 作为新的键名，如果没有则从 0 开始
$array3[] = "e";
echo $array3[104]; // output: e
echo "<br />";


// 遍历数组
foreach ($array3 as $i => $value)
{
    // 销毁数组中的指定元素
    unset($array3[$i]);
}
var_dump($array3);
// 之前通过 unset 销毁了每个数组元素，但是数组内部的 key 索引不会被破坏，如下例，其 key 值会由系统分配为 105
$array3[] = "xxx";
echo $array3[105]; // output: xxx
echo "<br />";

// 销毁指定的变量，如果是销毁数组的话，则数组内部的 key 索引也会被破坏
unset($array3);
var_dump($array3);
// 由于之前数组内部的 key 索引被破坏了，所以下例中，其 key 值会由系统分配为 0
$array3[] = "yyy";
echo $array3[0]; // output: yyy
echo "<br />";


// 将任意变量转换为数组时，数组的第一个元素即为该变量本身
$s = "sss";
$array4 = (array)$s;
echo $array4[0]; // output: sss
echo "<br />";


// 通过 array_values 可以重建数组内部的 key 索引
$array5 = array
(
    "a" => "abx",
    "x" => "xyz",
    0 => "123",
);
$array5 = array_values($array5); // 无论之前的 key 是什么，在 array_values 之后，数组内的 key 索引都将变为从 0 开始递增的整型数据
var_dump($array5);


// 通过 list 函数将数组中的成员依次赋值给指定的变量
// 注意：array[0] 对应 list 的 1 个参数，array[1] 对应 list 的 2 个参数......（这里的 array[0], array[1] 不是指第 0 个元素, 第 1 个元素，而是 key 为 0 的元素, key 为 1 的元素）
list ($r1, $r2, $r3) = $array5;
echo "$r1, $r2, $r3"; // output: abx, xyz, 123
echo "<br />";
