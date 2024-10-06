<?php
$num = 123456789.1234567;
echo number_format($num);  // Output: 123,456,789

echo number_format($num, 4);  // Output: 123,456,789.1235

echo number_format($num, 7, chr(44), " ");  // Output: 123 456 789,1234567
?>