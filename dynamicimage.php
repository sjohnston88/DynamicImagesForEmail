<?php
header('Content-type: image/jpeg');
header('Cache-Control: no-cache, max-age=0');

// Set the font to use
$fontType = '';

// Set the font colour
$fontColour = 0x000000;

// Set the font size
$fontSize = 72;

// Get URL parameters
$imageCopy = urldecode($_SERVER['QUERY_STRING']);

// Create a fallback if users name is too long
if (strlen($imageCopy) > 16  OR (strlen($imageCopy) < 5 )){
   $imageCopy = 'Hi, There!';
}

// Get background to be used (600 x 400 )
$imageBg = ImageCreateFromJPEG('');

// Calculate width of string
$calcText = imagettfbbox($fontSize, 0, $fontType, $imageCopy);

// Centre Horizontally
$xPos = ceil((600 - $calcText[2]) / 2);

// Create image
imagettftext($imageBg, $fontSize, 0, $xPos, 220, $fontColour, $fontType, $imageCopy);
 
// Output
imagejpeg($imageBg,NULL,100);

?>