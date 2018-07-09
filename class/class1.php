<?php
/**
 * 类的相关知识点 1（基础）
 *
 * 规范：命名空间与目录路径对应，类名与文件名对应，文件以 .class.php 为后缀名
 */

class MyClass1
{
    // 类常量，没有“$”符号，不能被覆盖
    const MyConstant = 'constant value';
    // 静态属性
    static $myStaticProperty = "static property";

    // 对于属性和方法的访问控制有 private protected public（默认值）
    private $_name;
    private $_age;

    // 构造函数
    // PHP 中的魔术方法（magic method）均以 __（两个下划线）开头（类似的还有 __destruct()，__call()，__callStatic()，__get()，__set()，__isset()，__unset()，__sleep()，__wakeup()，__toString()，__invoke()，__set_state() 和 __clone() 等）
    function __construct()
    {
        echo "MyClass1 construct";
        echo "<br />";

        // 获取参数个数
        $args_num = func_num_args();

        if ($args_num == 1)
        {
            // $this 代表当前对象，是指向类实例的指针
            $this->_name = func_get_arg(0);
        }
        else if ($args_num == 2)
        {
            $this->_name = func_get_arg(0);
            $this->_age = func_get_arg(1);
        }
        else
        {

        }
    }

    // 析构函数
    function __destruct()
    {
        print "MyClass1 destruct";
        echo "<br />";
    }

    // 构造函数，此种方式在 PHP 5.3.3 或以上可支持
    // 此种方式的构造函数也可以当做方法被调用
    public function MyClass1()
    {
        echo "i am not a construct, i am a method";
    }

    // 静态方法
    public static function myStaticMethod()
    {
        return "static method";
    }

    // 方法
    public function getInfo()
    {
        // $this 代表当前对象，是指向类实例的指针
        return "name: " . $this->_name . ", age: " . $this->_age;
    }

    // 不直接支持方法的重载（overload），可以通过相关的魔术方法来实现（参见：class3.php）
    // public function getInfo($name) { }

    // 带参数类型约束的方法，类型约束不能用于 int 或 string 之类的标量类型
    // 本例约束了参数 $ary 必须是 array 类型
    public function getFirst(array $ary)
    {
        return $ary[0];
    }
}

// 被声明为 final 的类或属性或方法，无法继承
// 只能继承一个类
final class MyClass2 extends MyClass1
{
    // 构造函数可以为参数设置默认值（方法或函数也可以为参数设置默认值）
    function __construct($name = "wanglei", $age = 100)
    {
        echo "MyClass2 construct";
        echo "<br />";

        // parent 代表当前类的基类
        parent::__construct($name, $age);

        // self 代表当前类
        // $this 代表当前对象，是指向类实例的指针
    }

    // 析构函数
    function __destruct()
    {
        print "MyClass2 destruct";
        echo "<br />";

        parent::__destruct();
    }

    // 覆盖基类的同名方法（override）
    public function getInfo()
    {
        // $this 代表当前对象，指向类实例的指针
        return "MyClass2 - " . parent::getInfo();
    }
}

// 类的实例化
$objClass1 = new MyClass1("webabcd", 35);
// 通过 -> 调用实例方法或实例属性
echo $objClass1->getInfo();
echo "<br />";
// 通过 -> 调用实例方法或实例属性（MyClass1() 是构造函数，也可以当做方法被调用）
echo $objClass1->MyClass1();
echo "<br />";

$objClass2 = new MyClass2();
echo $objClass2->getInfo();
echo "<br />";

// instanceof - 用于判断一个对象是否是指定类的实例
if($objClass2 instanceof MyClass1)
{
    echo '$objClass2 instanceof MyClass1';
    echo "<br />";
}

// 通过 :: 调用类常量或静态属性或静态方法
echo MyClass1::MyConstant;
echo "<br />";

// 通过 :: 调用类常量或静态属性或静态方法
echo MyClass1::$myStaticProperty;
echo "<br />";

// variable class（可变类），将变量的值作为类名
$className = 'MyClass1';
// variable method（可变方法），将变量的值作为方法名
$methodName = 'myStaticMethod';
// 通过 :: 调用类常量或静态属性或静态方法
echo $className::$methodName();
echo "<br />";

// 调用带参数类型约束的方法
echo $objClass1->getFirst(array("a", "b", "c"));
echo "<br />";