<?php
header("Content-Type: image/png");
// Create the size of image or blank image
$image = imagecreate(500, 600);

// Set the background color of image
$background_color = imagecolorallocate($image, 0, 153, 0);

// Set the text color of image
$text_color = imagecolorallocate($image, 255, 255, 255);

// Function to create image which contains string.
imagestring($image, 5, 180, 100, "GeeksforGeeks", $text_color);
imagestring($image, 3, 160, 120, "A computer science portal", $text_color);

//
//    for ($i=0; $i<60; $i++) {
//  imageline($image, 10*$i, $i+1, 10*($i+1),$i-1+1, $text_color);
//    }
imagepng($image);
imagedestroy($image);

?>