<?php
$fp = fopen("test.txt", 'r');
$fp = fopen("test.txt", 'w');
$fp = fopen("test.txt", 'a');

if ($fp = fopen("test.txt", "w")) {  // do something with $fp}
    ($fp = fopen("test.txt", "w")) or die("Couldn't open file, sorry");
}
$fp = fopen("binary_file", "wb"); //and read them like this:
$fp = fopen("binary_file", "rb");

fclose($fp);
