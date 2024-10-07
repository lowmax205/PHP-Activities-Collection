<?php
$home_url = "WWW.CORROSIVE.CO.UK";
$home_url = strtolower( $home_url ); 
if ( ! ( strpos ( $home_url, "http://") === 0) ) 
$home_url = "http://$home_url"; 
print $home_url; 
// prints "http://www.corrosive.co.uk" 
?>