<?php
 print "Welcome <b>".$_POST['user']."</b><br/>\n";
 print "Your address is:<br/><b>".$_POST['address']."</b><br/>\n"; 
 if ( is_array( $_POST['products'] )  ) {
 print "<p>Your product choices are:</p>\n";
 print "<ul>\n";
     foreach ( $_POST['products'] as $value ) {
        print "<li>$value</li>\n";
     }
 print "</ul>\n";
} 	
?>
