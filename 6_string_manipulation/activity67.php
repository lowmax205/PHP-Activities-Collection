<?php
// nl2br() example
$string = "one line\nanother line\na third for luck\n";
echo nl2br($string);  // Output: one line<br />another line<br />a third for luck<br />

// wordwrap() example
$string = "Given a long line, wordwrap() is useful as a means of breaking it into a column and thereby making it easier to read";
echo wordwrap($string, 24, "<br/>\n");  // Output will wrap at 24 characters
?>