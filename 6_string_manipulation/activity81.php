<?php
print number_format(100000.56 ); 
// 100,001 
print number_format (100000.56, 2 ); 
// 100,001.56 
print number_format(100000.56, 4 ); 
// 100,001.5600 
print number_format (100000.56, 2, "-", " "); 
// 100 000-56 
?>