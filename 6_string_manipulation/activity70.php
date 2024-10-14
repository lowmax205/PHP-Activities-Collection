<?php
$string = "<p>I <i>simply</i> will not have it,"; 
$string .= "<br/>said Mr Dean</p><b>The end</b>"; 
print strip_tags( $string, "<br/>" );
?>