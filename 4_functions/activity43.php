<?php 
function &addFive( &$num ) 
{ $num+=5; return $num; } 

$orignum = 10; $retnum = & addFive($orignum ); 
$orignum += 10; 
print($retnum ); // prints 25 

?> 
