<?php
$dirname = ".";
$dh = opendir($dirname);
while (($file = readdir($dh)) !== false) {
    if (is_dir("$dirname/$file")) {
        print "(D) ";
    }
    print "$file<br/>";
}
closedir($dh);
