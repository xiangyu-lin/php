<?php

// strtotime() 将英文文本日期时间描述解析成 Unix时间戳

echo time();
echo strtotime('now');

echo date('Y-m-d H:i:s',time()+24*3600); // tomorrow
echo date('Y-m-d H:i:s',time('+1 day')); 

echo date('Y-m-d H:i:s',time('+2 days')); // 超过一  days months years 用复数
echo date('Y-m-d H:i:s',time('+1 month')); 
echo date('Y-m-d H:i:s',time('+2 years 3 months 12 days')); 
