<?php
$atime = fileatime("test.txt");
print "test.txt was last accessed on " . date("D d M Y g:i A", $atime);

$mtime = filemtime("test.txt");
print "test.txt was last modified on " . date("D d M Y g:i A", $mtime);

$ctime = filectime("test.txt");
print "test.txt was last changed on " . date("D d M Y g:i A", $ctime);
