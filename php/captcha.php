<?php
  header("Content-Type: image/png");
  $im = @imagecreate(90, 50) or die("Error al cargar la imagen");
  $color_fondo = imagecolorallocate($im, 200, 200, 200);
  $color_texto = imagecolorallocate($im, 0, 0, 0);

  function caracteres($chars,$length){
    $captcha = null;
    for ($i=0; $i < $length; $i++) {
      $random = rand(0,count($chars)-1);
      $captcha .= $chars[$random];
    }
    return $captcha;
  }

  $captcha = caracteres(array(0,1,2,3,4,5,6,7,8,9,'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P'),4);
  setcookie('captcha',sha1($captcha),time()+60*3);

  imagettftext($im,20,10,8,40,$color_texto,'../fuentes/Panic.ttf',$captcha);
  imagepng($im);
?>
