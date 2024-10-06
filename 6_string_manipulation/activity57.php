<?php
// Using printf()
$dollars = "20 dollars";
printf("%d", $dollars);  // Output: 20

$dollars = 20;
printf("%.2f", $dollars);  // Output: 20.00

// Using sprintf()
$x = sprintf("%'.-40.40s%'.3d%s", "Repairs and Maintenance", 115, "<br/>\n");
echo $x;  // Output: Repairs and Maintenance.................115
?>