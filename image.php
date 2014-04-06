<?php
if (!ini_get('allow_url_fopen')) {
    phpinfo();
    die();
}

/* Attempt to open */
$imgname = ($_GET['url']);
$im = imagecreatefrompng($imgname);

/* See if it failed */
if (!$im) {
    /* Create a blank image */
    $im = imagecreatetruecolor(150, 30);
    $bgc = imagecolorallocate($im, 255, 255, 255);
    $tc = imagecolorallocate($im, 0, 0, 0);

    imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

    /* Output an error message */
    imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
} else {
    imagettftext($im, 20, 0, 30, imagesy($im) - 30, 0, './HansKendrick-Regular.ttf', 'Shared with Cuidas\' Imageproxy');
    imagettftext(
        $im,
        20,
        90,
        imagesx($im) - 30,
        imagesy($im) - 30,
        0,
        './HansKendrick-Regular.ttf',
        'source: ' . urldecode($_GET['url'])
    );
}


header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);