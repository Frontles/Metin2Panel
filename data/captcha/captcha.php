<?php
    /**
     * Created by PhpStorm.
     * User: user
     * Date: 3.01.2017
     * Time: 00:13
     */

    session_start();

    function generateRandomString()
    {
        $characters = '23456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function float()
    {
        $float = rand(-5, 5);
        return $float;
    }

    function color($image)
    {
        $i = rand(0, 5);
        if ($i == 0) {
            $color = imagecolorallocate($image, 140, 10, 10);
        } elseif ($i == 1) {
            $color = imagecolorallocate($image, 140, 100, 10);
        } elseif ($i == 2) {
            $color = imagecolorallocate($image, 0, 0, 0);
        } elseif ($i == 3) {
            $color = imagecolorallocate($image, 47, 79, 79);
        } elseif ($i == 4) {
            $color = imagecolorallocate($image, 139, 126, 102);
        } else {
            $color = imagecolorallocate($image, 139, 0, 139);
        }
        return $color;
    }

    $captcha = generateRandomString();
    $_SESSION['captcha_code'] = $captcha;

    $font = "./fonts/times_new_yorker.ttf";

    $image = imagecreatetruecolor(200, 60);

    $black = imagecolorallocate($image, 0, 0, 0);

    $color[0] = color($image);
    $color[1] = color($image);
    $color[2] = color($image);
    $color[3] = color($image);
    $color[4] = color($image);
    $color[5] = color($image);

    $background = imagecolorallocate($image, 224, 238, 238);

    imagefilledrectangle($image, 0, 00, 200, 100, $background);

    imagettftext($image, 30, float(), 10, 40, $color[0], $font, $captcha[0]);
    imagettftext($image, 30, float(), 40, 40, $color[1], $font, $captcha[1]);
    imagettftext($image, 30, float(), 70, 40, $color[2], $font, $captcha[2]);
    imagettftext($image, 30, float(), 100, 40, $color[3], $font, $captcha[3]);
    imagettftext($image, 30, float(), 130, 40, $color[4], $font, $captcha[4]);
    imagettftext($image, 30, float(), 160, 40, $color[5], $font, $captcha[5]);

    header("Content-type: image/png");
    imagepng($image);