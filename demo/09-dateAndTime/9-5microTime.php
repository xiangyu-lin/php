<?php

// microtime() 获取微秒
// 计算php程序执行时间等

// echo time();

// echo "\n";

// echo microtime();
// echo microtime(true); // 浮点数 4位小数

echo "\n";

// 计算执行时间
$start_time = microtime(true);

for ($i = 0; $i <= 1000000; $i++) {
    $array[] = $i;
}
$end_time = microtime(true);
$run_time = $end_time - $start_time;
echo $run_time;

