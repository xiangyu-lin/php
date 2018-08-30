<?php

/**
 * 交换键值 array_flip() 
 * 拆分字串 explode()
 * 取整 ceil(20/4.5)
 * 截取中文  mb_substr()
 */

/**
 * @param string $fontfile 字体文件
 * @param number $type     1 数字, 2 字母, 3 数字+字母, 4 汉字 
 * @param number $length   验证码
 * @param string $codeName 存入session 名字
 * @param number $pixel    像素点
 * @param number $line     线段 
 * @param number $arc      圆弧
 * @param number $width    画布宽度
 * @param number $height   画布高度
 * @return number void
 */
function getVerify($fontfile, $type=1, $length=4, $codeName='verifyCode', $pixel=50, $line=3, $arc=3,$width=200, $height=50) 
{
    // 创建画布
    //$width = 200;
    //$height = 50;
    $image = imagecreatetruecolor($width, $height);
    // 创建颜色
    $color_white = imagecolorallocate($image, 255, 255, 255);
    // 创建填充矩形
    imagefilledrectangle($image, 0, 0, $width, $height, $color_white);
    // 得到随机颜色
    function getRandColor($image) {
        return imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
    }
    
    //$type = 1;
    //$length = 4;
    
    switch ($type) {
        case 1:
            // 数字
            $string = join('',array_rand(range(0, 9), $length)); //随机取值
            break;
        case 2:
            // 字母
            $string = join('',array_rand(array_flip(array_merge(range('a', 'z'),range('A', 'Z'))), $length));
            
            break;
        case 3:
            // 数字加字母
            $string = join('',array_rand(array_flip(array_merge(range('a', 'z'),range('A', 'Z'),range(0, 9))), $length));
            break;
        case 4:
            // 汉字
            $str = "一,份,文,件,中,应,不,就,只,定,义,新,的,声,如,类,函,数,或,量,等,不,产,生 ,副,作,用,的,操,要,不,就,只,书,写,会,产,生,副,作,用,的,逻,辑,操,作,但,时,具,有,两,者";
            $arr = explode(',', $str);
            $string = join('',array_rand(array_flip($arr), $length));
            break;
        default:
            // 非法参数
            break;
    }
    
    // 将验证码存入session中
    session_start();
    $_SESSION[$codeName] = $string;
    for ($i = 0; $i < $length; $i++) {
        $size = mt_rand(16, 24);
        $angle = mt_rand(-15, 15);
        $x = 5 + ceil($width/$length) * $i;
        $y = mt_rand(ceil($height/2), $height-20);
        $color = getRandColor($image);
        //$fontfile = '../fonts/MSYHBD.TTF'; //有中文要选支持中文的字体
        // 中文 substr mb_substr()
        $text = mb_substr($string, $i, 1, 'utf-8');
        imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    
    //$pixel = 10;
    //$line = 3;
    //$arc = 2;
    
    // 干扰元素像素
    if ($pixel > 0) {
        for ($i = 1; $i <= $pixel; $i++) {
            imagesetpixel($image, mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
        }
    }
    
    // 干扰元素 线段
    if ($line > 0) {
        for ($i = 1; $i <= $line; $i++) {
            imageline($image, mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, $width), mt_rand(0, $height), getRandColor($image));
        }
    }
    
    // 干扰元素 圆弧
    if ($arc > 0) {
        for ($i = 1; $i <= $arc; $i++) {
            imagearc($image, mt_rand(0, $width/2), mt_rand(0, $height/2), mt_rand(0, $width), mt_rand(0, $height), mt_rand(0, 360), mt_rand(0, 360), getRandColor($image));
        }
    }
    
    
    
    header('content-type:image/png');
    imagepng($image);
    imagedestroy($image);
}

