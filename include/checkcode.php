<?php
////////////////////////////�ļ�˵��/////////////////////////////////
//����������������֤��ģ��
//////////////////////////////////////////////////////////////////////
session_start();
header("Content-type: image/png");
header('Expires: Fri, 14 Mar 1980 20:53:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-cache, must-revalidate');
header('Pragma: no-cache');
/*
* ��ʼ��
*/
$border   = 1; //�Ƿ�Ҫ�߿� 1Ҫ:0��Ҫ
$how      = 4; //��֤��λ��
$w        = $how*15; //ͼƬ���
$h        = 23; //ͼƬ�߶�
$fontsize = 6; //�����С
$alpha    = "01234"; //����1
$number   = "56789"; //����2
$randcode = ""; //��֤���ַ�����ʼ��

srand((double)microtime()*1000000); //��ʼ�����������
$im = ImageCreate($w, $h); //������֤ͼƬ

/*
* ���ƻ������
*/
$bgcolor = ImageColorAllocate($im, 255, 255, 255); //���ñ�����ɫ
ImageFill($im, 0, 0, $bgcolor); //��䱳��ɫ
if($border){
    $black = ImageColorAllocate($im, 0, 0, 0); //���ñ߿���ɫ
    ImageRectangle($im, 0, 0, $w-1, $h-1, $black);//���Ʊ߿�
}

/*
* ��λ��������ַ�
*/
for($i=0; $i<$how; $i++)
{   
    $alpha_or_number = mt_rand(0, 1); //ѡ������1����2
    $str = $alpha_or_number ? $alpha : $number;
    $which = mt_rand(0, strlen($str)-1); //ȡ�ĸ��ַ�
    $code = substr($str, $which, 1); //ȡ�ַ�
    $j = !$i ? 4 : $j+15; //���ַ�λ��
    $color3 = ImageColorAllocate($im, mt_rand(0,100), mt_rand(0,100), mt_rand(0,100)); //�ַ��漴��ɫ
    ImageChar($im, $fontsize, $j, 3, $code, $color3); //���ַ�
    $randcode .= $code; //��λ������֤���ַ���
}

/*
* ��Ӹ���
*/ 
for($i=0; $i<$how*10; $i++)//�汳�����ŵ�
{   
    $color2 = ImageColorAllocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255)); //���ŵ���ɫ 
    ImageSetPixel($im, mt_rand(0,$w), mt_rand(0,$h), $color2); //���ŵ�
}

//����֤���ַ���д��session
$_SESSION['randcode'] = $randcode;

/*��ͼ����*/
Imagepng($im);
ImageDestroy($im);
/*��ͼ����*/
?> 
