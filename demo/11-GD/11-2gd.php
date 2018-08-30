<?php

/**
 * GD库操作步骤
 *  创建画布
 *  创建颜色
 *  开始绘画
 *  输出或保存图像
 *  销毁资源
 */

// 1.创建画布
$width = 500;
$height = 500;
$image = imagecreatetruecolor($width, $height); // 创建画布 返回资源， 返回图像标识符

// 2.创建颜色
$red = 255;
$green = 0;
$blue = 0;
$color_red = imagecolorallocate($image, $red, $green, $blue); // 创建颜色 红色
$color_white = imagecolorallocate($image, 255, 255, 255); // 白色

// 3.开始绘画
$font = 5;
$x = 50;
$y = 100;
$c = 'X';
imagechar($image, $font, $x, $y, $c, $color_red); //水平绘制一个字符
imagecharup($image, $font, $x, $y, 'L', $color_red);//垂直绘制一个字符
imagestring($image, $font, 100, 100, 'She is a girl on fire.', $color_white); //水平绘制字符串

// 4.告诉浏览器以图片的形式来显示
header('content-type:image/jpeg'); // image/gif image/png

// 5.通过 imagejpeg($image) 输出图像
imagejpeg($image); // imagegif() imagepng()

// 6.销毁资源
imagedestroy($image);