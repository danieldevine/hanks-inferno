<?php

namespace App\Services;

class ImageService
{

    /**
     * Writes text onto an image
     *
     * @param  string $base_image .jpg file to use as base
     * @param  string $text text to overlay
     * @return mixed .png file with image and text overlaid
     */
    function textToImage($base_image, $text)
    {
        $image = @imagecreatefromjpeg($base_image);
        $white = imagecolorallocate($image, 255, 255, 255);
        $font  = $_SERVER["DOCUMENT_ROOT"] . '/assets/fonts/LibreBaskerville-Regular.ttf';

        imagettftext($image, 12, 0, 20, 70, $white, $font, $text);

        return $image;
    }
}
