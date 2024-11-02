<?php
$filename = "test2.txt";
print "Writing to $filename<br/>";
$fp = fopen($filename, "w") or die("Couldn't open $filename");
fwrite($fp, "Hello world\n");
fclose($fp);
print "Appending to $filename<br/>";
$fp = fopen($filename, "a") or die("Couldn't open $filename");
fputs($fp, "And another thing\n");
fclose($fp);
