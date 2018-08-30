<?php

// 类型转换 

/* 自动类型转换:
 * 数值型 -> 数值本身
 * true -> 1
 * false -> 空字符串
 * null -> 空字符串
 * ---
 * 数组 -> Array
 * 资源 -> Resource id #n
 * 对象不能直接转换成字符串
 */

echo 123;
echo 1.23;
$arr = array(1,2,3);
echo $arr;
$handle = fopen('10-1String.php','r');
$obj = new stdClass();
// echo $obj;
// Recoverable fatal error: Object of class stdClass could not be converted to string

// 强制转换(显示转换)
// 临时转换  (string) strval()

$var = 123;
$res = (string)$var;
echo $res;
$var = true;
echo strval($var);

// settype($var, type)  gettype($var)
$str = 'xiangyu.lin';
echo gettype($str); // 获取变量类型

// 设置变量类型 永久转换
$var1 = 12;
settype($var1, 'string');
var_dump($var1);

// 字符串转换成其他类型

// 转数字类型 取合法数字 如果不是以合法数字开始 转换成0
echo 1 + '3lnx'; //3
echo 1 + '2e3'; //2000
echo 2 + 'true'; //0

// 转布尔型  空字符串或者字符串'0' "0" -> false
$res = '0';
if ($res) {
    echo 'true';    
} else {
    echo 'false';
}

/* 以下四种数据类型也准换为 false
 *  $res = 0;
 *  $res = 0.0;
 *  $res = array();
 *  $res = null; 
 */