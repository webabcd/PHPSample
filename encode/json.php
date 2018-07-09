<?php
/**
 * Created by PhpStorm.
 * User: wanglei
 * Date: 2015/12/30
 * Time: 9:45
 */

class Name
{
    public $firstName;
    public $lastName;
}

class Student
{
    public $name;

    public $number;
    public $date1;
    public $date2;
}

$jsonArray = '
[
    {
        "name":{"firstName":"abc", "lastName":"xyz"},
        "number":1,
        "date1":"2015-12-30 10:00:48",
        "date2":1451440848
    },
    {
        "name":{"firstName":"lmn", "lastName":"rst"},
        "number":2,
        "date1":"2015-11-22 17:13:41",
        "date2":1448183621
    }
]';

// 设置当前时区为东八时区（北京时区）
date_default_timezone_set("Etc/GMT-8");

// json 字符串转对象
$result = array();
$myArray = json_decode($jsonArray, true);
$myArrayCount = count($myArray);
for ($i = 0; $i < $myArrayCount; $i++)
{
    $student = new Student();
    $student->number = $myArray[$i]["number"];
    $student->date1 = $myArray[$i]["date1"];
    $student->date2 = date('Y-m-d H:i:s', $myArray[$i]["date2"]);

    $name = new Name();
    $jsonName = $myArray[$i]["name"];
    $name->firstName = $jsonName["firstName"];
    $name->lastName = $jsonName["lastName"];

    $student->name = $name;
    $result[] = $student;
}
var_dump($result);

// 对象转 json 字符串
echo json_encode($result);
echo "<br />";

echo "<br />";


// 获取当前时间的时间戳（到 1970-1-1 的秒数）
echo time();
echo "<br />";

// 获取指定时间的时间戳（到 1970-1-1 的秒数）
echo strtotime("2015-12-30 16:00:10");
echo "<br />";

// 时间戳的格式化
echo date('Y-m-d H:i:s', time());
echo "<br />";

// 时间戳的格式化
echo date('Y-m-d H:i:s', 1460969676);
echo "<br />";

