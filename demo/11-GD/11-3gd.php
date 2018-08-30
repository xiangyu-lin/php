<?php

/**
 * 改变画布颜色
 * 使用系统字体绘制内容
 * 保存到文件
 */

// 创建画布
$image = imagecreatetruecolor(500, 500);

// 创建颜色
$color_white = imagecolorallocate($image, 255, 255, 255);
$color_rand = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));

// 绘制填充矩形
imagefilledrectangle($image, 0, 0, 500, 500, $color_white);

// 绘画 (windows 运行 -> fonts 查看字体库)
$text = 'xiangyu.lin --cmd --run';
imagettftext($image, 20, 0, 100, 100, $color_rand, 'fonts/CONSOLA.TTF', $text);

// 告诉浏览器以图像形式显示
header('content-type:image/gif');

// 输出图像
imagegif($image);
imagegif($image, 'image/1.gif'); // 保存到文件

// 销毁资源
imagedestroy($image);