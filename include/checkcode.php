<?php
////////////////////////////文件说明/////////////////////////////////
//功能描述：产生验证码模块
//////////////////////////////////////////////////////////////////////
session_start();
header("Content-type: image/png");
header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
/*
* 初始化
*/
$border   = 1; //是否要边框 1要:0不要
$how      = 4; //验证码位数
$w        = $how*15; //图片宽度
$h        = 23; //图片高度
$fontsize = 6; //字体大小
$alpha    = "01234"; //数字1
$number   = "56789"; //数字2
$randcode = ""; //验证码字符串初始化

srand((double)microtime()*1000000); //初始化随机数种子
$im = ImageCreate($w, $h); //创建验证图片

/*
* 绘制基本框架
*/
$bgcolor = ImageColorAllocate($im, 255, 255, 255); //设置背景颜色
ImageFill($im, 0, 0, $bgcolor); //填充背景色
if($border){
    $black = ImageColorAllocate($im, 0, 0, 0); //设置边框颜色
    ImageRectangle($im, 0, 0, $w-1, $h-1, $black);//绘制边框
}

/*
* 逐位产生随机字符
*/
for($i=0; $i<$how; $i++)
{   
    $alpha_or_number = mt_rand(0, 1); //选择数字1还是2
    $str = $alpha_or_number ? $alpha : $number;
    $which = mt_rand(0, strlen($str)-1); //取哪个字符
    $code = substr($str, $which, 1); //取字符
    $j = !$i ? 4 : $j+15; //绘字符位置
    $color3 = ImageColorAllocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)); //字符随即颜色
    ImageChar($im, $fontsize, $j, 3, $code, $color3); //绘字符
    $randcode .= $code; //逐位加入验证码字符串
}

/*
* 添加干扰
*/ 
for($i=0; $i<$how*10; $i++)//绘背景干扰点
{   
    $color2 = ImageColorAllocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //干扰点颜色 
    ImageSetPixel($im, mt_rand(0,$w), mt_rand(0,$h), $color2); //干扰点
}

//把验证码字符串写入session
$_SESSION['randcode'] = $randcode;

/*绘图结束*/
Imagepng($im);
ImageDestroy($im);
/*绘图结束*/
?> 
