<?php
echo number_format(100000.56);  // Output: 100,001
echo number_format(100000.56, 2);  // Output: 100,000.56
echo number_format(100000.56, 4);  // Output: 100,000.5600
echo number_format(100000.56, 2, "-", " ");  // Output: 100 000-56
?>