<?php 
function headingWrap( $txt, $size=3 ) 
{ 
print "<h$size>$txt</h$size>";
}
headingWrap("Book title", 1); 
headingWrap("Chapter title",);
headingWrap("Section heading",);
?> 
