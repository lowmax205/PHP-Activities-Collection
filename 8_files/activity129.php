<?php
$fp = fopen("test.txt", "a") or die("couldn't open");
flock($fp, LOCK_EX);
fwrite($fp, "Writing with exclusive lock\n");
flock($fp, LOCK_UN);
fclose($fp);
