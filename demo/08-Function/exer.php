<?php

/* 
 * 封装一个时间日期 星期的形式 2018-08-19 星期日
 * @param string $del1 年
 * @param string $del2 月
 * @param string $del3 日
 * @return string 
 * */ 

function getDateStr($del1 = "年", $del2 = "月", $del3 = "日") 
{
    $dayArr = array("日","一","二","三","四","五","六");
    $day = date('w'); // 一周内的第几天 0-6
    echo date("Y{$del1}m{$del2}d{$del3} 星期").$dayArr[$day];
    
}
getDateStr($del1="-", "-","-");

/*
 * 默认产生 4位验证码
 * type=1 数字
 * type=2 字母
 * type=3 字母加数字
 * 也可以改变验证码长度
 */