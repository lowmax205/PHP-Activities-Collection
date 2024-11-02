<?php
$filename = "test.txt";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
while (!feof($fp)) {
    $chunk = fread($fp, 16);
    print "$chunk<br/>";
}
fclose($fp);
