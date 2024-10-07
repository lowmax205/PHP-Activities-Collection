<?php
$string = "As usual you will find me at http://www.witteringonaboutit.com/"; 
$string .= "chat/eating_green_cheese/forum.php. Hope to see you there!"; 
print wordwrap( $string, 24, "<br/>\n", 1 ); 
?>