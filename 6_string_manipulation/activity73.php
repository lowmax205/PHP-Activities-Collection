<?php 
$source = array( "The package which is at version 4.2 was released in 2000", "The year 2000 was an excellent period for PointyThing4.2" ); 
$search = array( "4.2", "2000" ); 
$replace = array ( "5.0", "2001" ); 
$source = str_replace( $search, $replace, $source ); 
foreach ( $source as $str ) print "$str<br>"; 
// prints:  
//The package which is at version 5.0 was released in 2001  
//The year 2001 was an excellent period for PointyThing5.0 ?> 
