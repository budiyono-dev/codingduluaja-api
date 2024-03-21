<?php

namespace App\Helper;

use InvalidArgumentException;

class ImagePlaceholder
{
    public static function placeholderByName(
        string $fullname,
        string $path,
        string $filename,
        int $height = 500,
        int $width = 500
    ): void {
        if (trim($fullname) === '') {
            throw new InvalidArgumentException('fullname cannot be empty');
        }
        if (trim($path) === '') {
            throw new InvalidArgumentException('path name cannot be empty');
        }
        if (trim($filename) === '') {
            throw new InvalidArgumentException('filename name cannot be empty');
        }
        list($fg, $bg) = PalleteImage::getPallet();
        // Create a new true-color image with the specified dimensions
        $image = imagecreatetruecolor($width, $height);

        // Set the background color (white)
        $backgroundColor = imagecolorallocate($image, $bg[0], $bg[1], $bg[2]);

        // Fill the image with the background color
        imagefill($image, 0, 0, $backgroundColor);

        // Set the text color (black)
        $textColor = imagecolorallocate($image, $fg[0], $fg[1], $fg[2]);

        // Generate the text to be displayed on the placeholder image
        $text = ImagePlaceholder::generateInitials($fullname);

        // Define the font file and font size
        $fontFile = asset('assets/font/Roboto-Bold.ttf');
        $fontSize = 200;

        // Calculate the position to center the text in the image
        $textBoundingBox = imagettfbbox($fontSize, 0, $fontFile, $text);
        $textWidth = abs($textBoundingBox[4] - $textBoundingBox[0]) + 10;
        $textHeight = abs($textBoundingBox[5] - $textBoundingBox[1]) + 10;

        $textX = ($width - $textWidth) / 2;
        $textY = ($height - $textHeight) / 2 + $textHeight;

        // Add the text to the image
        imagettftext($image, $fontSize, 0, $textX, $textY, $textColor, $fontFile, $text);

        $imagePath = $path . DIRECTORY_SEPARATOR . $filename;

        // Save the image to the file system
        imagepng($image, $imagePath);

        // Free up memory by destroying the image resource
        imagedestroy($image);
    }

    public static function generateInitials($fullName)
    {
        $words = explode(' ', $fullName);
        $initials = '';
        foreach ($words as $word) {
            $initials .= strtoupper(substr($word, 0, 1));
        }
        return $initials;
    }
}
