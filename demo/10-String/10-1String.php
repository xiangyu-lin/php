<?php

// Notice: Use of undefined constant str - assumed 'str' in, 常量的写法
echo str; //不能这样写
echo 'str';

// 字串定界符  单引号 双引号 heredoc语法 , nowdoc语法

/* 
 * 单双引号 强弱引用 双引号解析变量 单引号不解析变量  单引号解析效率高
 * 双引号解析所有转义符 ， 单引号只解析  \\ \' 两个转义符 
 */

/**
 * 花括号 用来明确变量名的界限,将变量扩展成一个整体来解析,
 * 花括号中间不要有空格
 */

$username = 'xiangyu.lin';
echo "my name is {$username}s";
echo "my name is ${username}s"; // 也可以 但不建议

/**
 * 通过{} 对指定字符做增删改查操作
 * 字符串下标从 0 开始
 * 也可以用中括号
 */

$str = 'xiangyu.lin';
echo $str{0};
$str{7} = '-'; // 只能用一个字符修改一个字符 , 而且不要替换中文
echo $str;
$str{0} = ''; // 删除 , 只是看不到, 但是位置和长度还在
$str{12}; // 增加 但也只能放一个
