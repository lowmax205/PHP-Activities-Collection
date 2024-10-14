<?php
$test = "http://p24.corrosive.co.uk/tk.php?id=353&sec=44&user=harry&context=php";
$delims = "?&";
$word = strtok($test, $delims);

while (is_string($word)) {
    if ($word) {
        print "$word<br/>";
    }
    $word = strtok($delims);
}
?>