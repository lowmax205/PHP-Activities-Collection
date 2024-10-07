<?php

$dollars = "20 dollars";
printf ("%d", $dollars);
// Prints: 20

$dollars = 20;
printf ("%.2f", $dollars);
// prints: $20.00

$ch4_title = "hahaha";
$ch4_pg = "ano";
$x = sprintf ("%'?-40.40s%'.3d%s", $ch4_title, $ch4_pg, "<BR>\n");
echo $x;
?>