<?php
$c="huhu";
$my_string = "olang";
if ($c != ord(9) && $c != ord(13)) {
    // Only append $c if not tab or enter
    $my_string = $c;
    }
echo $my_string;
?>