<?php

// 时间戳 从 1970年 1月 1日 00:00:00 到当前时间所经历的秒数

// time 返回时间戳

echo time(); // 获取当前时间戳
echo "\n";

echo date('H:i:S',time()),"\n"; // date 第二个参数默认就是时间戳
echo '一天之后: '.date('Y/m/d H:i:s',time()+24*3600);
echo '一周之后: '.date('Y/m/d H:i:s',time()+24*3600*7);

// mktime(h,i,s,n,j,Y) 得到指定日期的时间戳
// 可以从后往前依次省略
// 2018-08-20 00:00:00
echo mktime(0,0,0,8,20,2018);
echo "\n";
    
// 计算两个日期的时间差  用mktime 将日期转换成时间戳 在计算
$birth = mktime(0,0,0,1,18,1995);
$time = time();
$age =  floor(($time - $birth)/24/3600/365); // 去掉小数部分