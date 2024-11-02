<?php
$filename = "test.txt";
$fp = fopen($filename, "r") or die("Couldn't open $filename");
$fsize = filesize($filename);
$halfway = (int)($fsize / 2);
print "Halfway point: $halfway <br/>\n";
fseek($fp, $halfway);
$chunk = fread($fp, ($fsize - $halfway));
print $chunk;
fclose($fp);
