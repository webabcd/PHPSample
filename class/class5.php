<?php
/**
 * 类的相关知识点 5（加载指定的文件，自动加载类文件）
 */

/*
 * 包含并运行指定文件，可以是绝对路径也可以是相对路径
 * include 找不到的话则警告，然后继续运行（include_once: 在当前文件中只 include 指定文件一次）
 * require 找不到的话则错误，然后终止运行（require_once: 在当前文件中只 require 指定文件一次）
 * include '';
 * require '';
 * include_once '';
 * require_once '';
*/

// 演示如何通过 __autoload 魔术方法，来实现类的自动加载
function __autoload($class_name)
{
    // 加载指定的文件
    require_once $class_name . '.class.php';
}

// 如果在当前文件中找不到 MyClass 类，那么就会去调用 __autoload 魔术方法
$obj = new MyClass();
echo $obj->name;
echo "<br />";



