<?php

$str = 'hello php';
// 检测是否是字符串
var_dump($str);
// 得到字符串长度 strlen()
echo strlen($str);

$username = "Xiangyu.Lin lnn";
// 转换成小写
echo strtolower($username);
// 转换成大写
echo strtoupper($username);
// 首字母大写
echo ucfirst($username);
// 每个单词首字母大写
echo ucwords($username);