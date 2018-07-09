<?php
/**
 * 常量
 */

// 用 define 来定义常量
define("MyConst1", "MyConst1");
echo MyConst1;
echo "<br />";

// 在 PHP 5.3.0 之后支持用 const 来定义常量
const MyConst2 = "MyConst2";
echo MyConst2;
echo "<br />";



/**
 * 魔术常量（magic constant）
 *
 * 魔术常量，在不同的场景下会有不同的值
 */

// __LINE__ - 文件中的当前行号, 由其在脚本中所处的行来决定
echo __LINE__;
echo "<br />";

// __FILE__ - 当前文件的完整路径和文件名，如果用在被包含文件中，则返回被包含的文件名
echo __FILE__;
echo "<br />";

// __DIR__ - 文件所在的目录,如果用在被包括文件中，则返回被包括的文件所在的目录
echo __DIR__;
echo "<br />";

// __FUNCTION__ - 函数名称
// __CLASS__ - 类名称
// __METHOD__ - 方法名称
// __NAMESPACE__ - 命名空间名称
// __TRAIT__ - Trait 名称
