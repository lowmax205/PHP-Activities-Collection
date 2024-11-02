<?php
for ($x = 1; $x <= 3; $x++) {
    $incfile = "incfile" . $x . ".txt";
    print "<p>";
    print "Attempting include $incfile<br/>";
    include("$incfile");
    print "</p>";
}
