<?php
// EXERCISE 22
$counter = -4;
for ($counter; $counter <= 10 ; $counter++) { 
    if ($counter == 0) {
        continue;
    }
    $temp = 4000/$counter;
    print("4000 divided by counter ".$counter." is temp". $temp. "<br/>");
}