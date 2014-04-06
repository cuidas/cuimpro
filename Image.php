<?
if( !ini_get('allow_url_fopen') ) {
   phpinfo();
   die();
} 

/* Attempt to open */
$imgname = ($_GET['url']);
$im = imagecreatefrompng($imgname);


/* See if it failed */
if(!$im)
{
    /* Create a blank image */
    $im  = imagecreatetruecolor(150, 30);
    $bgc = imagecolorallocate($im, 255, 255, 255);
    $tc  = imagecolorallocate($im, 0, 0, 0);

    imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

    /* Output an error message */
    imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
}


header('Content-Type: image/png');

imagepng($im);
imagedestroy($im);
?>