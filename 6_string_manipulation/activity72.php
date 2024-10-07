<?php
echo trim(" sample string ");  // Output: 'sample string'

$text = "\t\t\tlots of room to breathe ";
echo ltrim($text);  // Output: 'lots of room to breathe '

$text = "\t\t\tlots of room to breathe ";
echo rtrim($text);  // Output: ' lots of room to breathe'
?>