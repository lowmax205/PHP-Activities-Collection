<?php
$membership = "mz99xyz";
$membership = substr_replace($membership, "00", 2, 2);
echo "New membership number: $membership<br/>";  // Output: New membership number: mz00xyz
?>