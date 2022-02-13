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
    function setText($base_image, $lines, $font)
    {
        $image = @imagecreatefromjpeg($base_image);
        $white = imagecolorallocate($image, 255, 255, 255);
        $font  = __DIR__ . '/../../storage/fonts/' . $font;

        // Starting Y position
        $y = 70;

        // Loop through the lines and place them on the image
        foreach ($lines as $line) {
            imagettftext($image, 12, 0, 20, $y, $white, $font, $line);

            // Increment Y so the next line is below the previous line
            $y += 25;
        }


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
        $verse = wordwrap($verse, 48);
        $lines = explode(PHP_EOL, $verse);

        return $lines;
    }

    //LibreBaskerville-Regular.ttf

    public function create($verse, $font)
    {
        $lines = $this->prepareForImage($verse);


        header('Content-Type: image/jpeg');

        $blank = __DIR__ . '/../../storage/images/blank.jpg';

        $img = $this->setText($blank, $lines, $font);

        imagepng($img, __DIR__ . '/../../public/assets/img/verse.png');

        imagedestroy($img);
    }
}
