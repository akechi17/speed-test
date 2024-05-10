<?php
$baseImage = imagecreatefromjpeg('omori.jpg');
$watermark = imagecreatefromjpeg('logonevtik.png');

$wWidth = imagesX($watermark);
$wHeight = imagesY($watermark);

$imgWidth = imagesX($baseImage);
$imgHeight = imagesY($baseImage);

imagecopy(
    $baseImage, $watermark, $wWidth + 240, 0, 0, 0, $wWidth, $wHeight
);

header('Content-Type: image/png');
imagepng($baseImage);
imagedestroy($baseImage);
?>