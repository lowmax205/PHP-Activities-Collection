<?php
// EXERCISE 21
for ($counter=1; $counter <= 10 ; $counter++) { 
    if ($counter == 0) {
        break;
    }
    $temp = 4000/$counter;
    print("4000 divided by counter is temp". $temp. "<br/>");
}