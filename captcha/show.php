<?php
include('captchaClass.php');

$img = imagecreatetruecolor(85, 20);
$black = imagecolorclosest($img, 0, 0, 0);
imagecolortransparent($img, $black);
$color_text = imagecolorallocate($img, 8, 20, 103);
imagefill($img, 0, 0, $black);
$arial = 'arial.ttf';
imagettftext($img, 18, 0, 5, 19, $color_text, $arial, Captcha::get());
header("Content-type: image/png");
imagepng($img);
imagedestroy($img);