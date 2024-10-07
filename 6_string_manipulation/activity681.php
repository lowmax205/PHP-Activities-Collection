<?php
// Convert to lowercase
$home_url = "WWW.CORROSIVE.CO.UK";
$home_url = strtolower($home_url);
echo $home_url;  // Output: www.corrosive.co.uk

// Convert to uppercase
$membership = "mz00xyz";
echo strtoupper($membership);  // Output: MZ00XYZ

// Capitalize words
$full_name = "VIolEt eLIZaBeTH bOTt";
echo ucwords(strtolower($full_name));  // Output: Violet Elizabeth Bott
?>