<?php
$filename = "test.txt";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
while (!feof($fp)) {
    $char = fgetc($fp);
    print "$char<br/>";
}
fclose($fp);
