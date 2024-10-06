<?php
// Using chr() to get character by ASCII code
echo chr(34);   // Output: " (quotation mark)

// Using ord() to get ASCII code of a character
$c = 'A';
echo ord($c);   // Output: 65

if ($c != ord(9) && $c != ord(13)) {
// Only append $c if not tab or enter
$my_string .= $c;
}

?>