<?php
    $photo_to_paste="img/p-5dfbcebda89168.94863931.jpg";  //image 321 x 400
    $white_image="img/1.jpg"; //873 x 622 

    $im = imagecreatefromjpeg($white_image);
    $condicion = GetImageSize($photo_to_paste); // image format?

    if($condicion[2] == 1) //gif
    $im2 = imagecreatefromgif("$photo_to_paste");
    if($condicion[2] == 2) //jpg
    $im2 = imagecreatefromjpeg("$photo_to_paste");
    if($condicion[2] == 3) //png
    $im2 = imagecreatefrompng("$photo_to_paste");

    imagecopy($im, $im2, (imagesx($im)/2)-(imagesx($im2)/2), (imagesy($im)/2)-(imagesy($im2)/2), 0, 0, imagesx($im2), imagesy($im2));

    imagejpeg($im,"test4.jpg",90);
    imagedestroy($im);
    imagedestroy($im2);