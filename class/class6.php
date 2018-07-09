<?php
/**
 * 类的相关知识点 6（命名空间）
 */

// 以下代码仅用于演示，实际项目中不建议在一个文件中定义多个 namespace

// 如果当前文件中只有一个命名空间，那么下面的这段可以省略掉命名空间的大括号，直接 namespace MyNamespace1; 即可
namespace MyNamespace1
{
    const MyConst = "MyNamespace1 MyConst";

    function myFunction()
    {
        echo "MyNamespace1 myFunction";
        echo "<br />";
    }

    class MyClass
    {
        public function myMethod()
        {
            echo "MyNamespace1 MyClass myMethod";
            echo "<br />";
        }
    }
}

// 定义命名空间时，可以指定路径
namespace Sub1\Sub2\MyNamespace2
{
    const MyConst = "MyNamespace2 MyConst";

    function myFunction()
    {
        echo "MyNamespace2 myFunction";
        echo "<br />";
    }

    class MyClass
    {
        public function myMethod()
        {
            echo "MyNamespace2 MyClass myMethod";
            echo "<br />";
        }
    }
}

namespace MyNamespace3
{
    // 调用指定命名空间中的指定常量
    echo \MyNamespace1\MyConst;
    echo "<br />";

    // 调用指定命名空间中的指定函数
    \MyNamespace1\myFunction();

    // 实例化指定命名空间中的类
    $obj1 = new \MyNamespace1\MyClass();
    $obj1->myMethod();
}

namespace MyNamespace4
{
    // use 指定的命名空间
    use \Sub1\Sub2\MyNamespace2;

    // 之后不用再写全命名空间的路径了，因为之前 use 过了

    echo MyNamespace2\MyConst;
    echo "<br />";

    MyNamespace2\myFunction();

    $obj1 = new MyNamespace2\MyClass();
    $obj1->myMethod();
}

namespace MyNamespace5
{
    // use 指定的命名空间，并为其设置别名
    use \Sub1\Sub2\MyNamespace2 as xxx;

    // 之后再调用命名空间时，可以使用其别名

    echo xxx\MyConst;
    echo "<br />";

    xxx\myFunction();

    $obj1 = new xxx\MyClass();
    $obj1->myMethod();
}