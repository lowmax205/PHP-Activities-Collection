<?php 
function test() 
{
global $testvariable;
$testvariable = "this is a test variable"; 
}
test();
print "test variable:$testvariable<br/>"; 
?> 
