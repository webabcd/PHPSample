<?php
/**
 * 类的相关知识点 2（抽象类，接口，trait）
 */

// 抽象类
abstract class MyAbstractClass
{
    // 抽象方法，子类必须定义这些方法
    abstract protected function getValue1();
    abstract public function getValue2($param1);

    // 普通方法（非抽象方法）
    public function getValue0()
    {
        return "getValue0";
    }
}

// 接口
interface MyInterface1
{
    // 接口常量，不能被覆盖
    const MyConstant = 'constant value';
    public function getValue3();
}

// 接口
interface MyInterface2 extends MyInterface1
{
    public function getValue4();
}

// 接口
interface MyInterface3
{
    public function getValue5();
}

// trait（可以 use 多个，允许有实现代码，但是本身不能实例化）
trait MyTrait1
{
    // 可以具有方法，静态方法，属性等
    function getValue6()
    {
        return "getValue6";
    }
}

// trait（可以 use 多个，允许有实现代码，但是本身不能实例化）
trait MyTrait2
{
    // 抽象方法（use 这个 trait 的类必须要定义这个方法）
    abstract function getValue7();
}

// trait（可以 use 多个，允许有实现代码，但是本身不能实例化）
trait MyTrait3
{
    function getValue6()
    {
        return "getValue6";
    }

    function getValue8()
    {
        return "getValue8";
    }
}

// 必须实现所有抽象方法和接口方法
// 类只能单继承，接口可以多继承
class MyClass1 extends MyAbstractClass implements MyInterface2, MyInterface3
{
    // 可以 use 多个 trait
    use MyTrait1, MyTrait2;
    use MyTrait3
    {
        // 多 trait 间有重名的，可以指定以哪个为准
        MyTrait1::getValue6 insteadof MyTrait3;
        // 可以为 trait 的指定方法设置别名（调用的时候用方法名也行，用别名也行）
        MyTrait3::getValue8 as alias;
    }

    // 可以将 protected 升级为 public
    public function getValue1()
    {
        return "getValue1";
    }

    // 可以加参数，但是加的参数必须要有默认值
    public function getValue2($param1, $param2 = 'param2')
    {
        return "getValue2, {$param1}, {$param2}";
    }

    public function getValue3()
    {
        return "getValue3";
    }

    public function getValue4()
    {
        return "getValue4";
    }

    public function getValue5()
    {
        return "getValue5";
    }

    public function getValue7()
    {
        return "getValue7";
    }
}

// 调用接口常量
echo MyInterface1::MyConstant;
echo "<br />";

$myClass1 = new MyClass1;
echo $myClass1->getValue0();
echo "<br />";
echo $myClass1->getValue1();
echo "<br />";
echo $myClass1->getValue2("webabcd");
echo "<br />";
echo $myClass1->getValue3();
echo "<br />";
echo $myClass1->getValue4();
echo "<br />";
echo $myClass1->getValue5();
echo "<br />";
echo $myClass1->getValue6();
echo "<br />";
echo $myClass1->getValue7();
echo "<br />";
echo $myClass1->getValue8();
echo "<br />";
echo $myClass1->alias();
echo "<br />";