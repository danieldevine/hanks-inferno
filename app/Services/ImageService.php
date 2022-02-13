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
    function setText($base_image, $text, $font)
    {
        $image = @imagecreatefromjpeg($base_image);
        $white = imagecolorallocate($image, 255, 255, 255);
        $font  = __DIR__ . '/../../storage/fonts/' . $font;

        imagettftext($image, 12, 0, 20, 70, $white, $font, $text);

        return $image;
    }

    /**
     * Cleans up and wraps the verse
     * for use in image generation
     *
     * @param string $verse
     * @return string
     */
    public function prepareForImage($verse)
    {
        //prepare for imaging
        $verse = strip_tags($verse);
        $verse = wordwrap($verse, 44);

        return $verse;
    }

    //LibreBaskerville-Regular.ttf

    public function create($verse, $font)
    {
        $verse = $this->prepareForImage($verse);

        header('Content-Type: image/jpeg');

        $blank = __DIR__ . '/../../storage/images/blank.jpg';

        $img = $this->setText($blank, $verse, $font);

        imagepng($img, __DIR__ . '/../../public/assets/img/verse.png');

        imagedestroy($img);
    }
}
