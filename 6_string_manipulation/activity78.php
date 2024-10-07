<?php
$string = "Given a long line, wordwrap() is useful as a means of"; 
$string .= "breaking it into a column and thereby making it easier to read"; 
print wordwrap( $string, 24, "<br/>\n"); 

?>