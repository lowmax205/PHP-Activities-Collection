<?php
function outputFileTestInfo($file)
{
    if (!file_exists($file)) {
        print "$file does not exist<br/>";
        return;
    }
    print "$file is " . (is_file($file) ? "" : "not ") . "a file<br/>";
    print "$file is " . (is_dir($file) ? "" : "not ") . "a directory<br/>";
    print "$file is " . (is_readable($file) ? "" : "not ") . "readable<br/>";
    print "$file is " . (is_writable($file) ? "" : "not ") . "writable<br/>";
    print "$file is " . (is_executable($file) ? "" : "not ") . "executable<br/>";
    print "$file is " . filesize($file) . " bytes<br/>";
    print "$file was accessed on " . date("D d M Y g:i A", fileatime($file)) . "<br/>";
    print "$file was modified on " . date("D d M Y g:i A", filemtime($file)) . "<br/>";
    print "$file was changed on " . date("D d M Y g:i A", filectime($file)) . "<br/>";
}
