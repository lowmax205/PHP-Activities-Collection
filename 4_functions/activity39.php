<?php
$num_of_calls = 0;
function numberedHeading($txt)
{
    global $num_of_calls;
    $num_of_calls++;
    print "<h1>$num_of_calls. $txt</h1>";
}
numberedHeading("Widgets");
print "<p>We build a fine range of widgets</p>";
numberedHeading("Doodads");
print "<p>Finest in the world</p>";
