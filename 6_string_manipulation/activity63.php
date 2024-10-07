<?php
// Array of dates (month, day, year)
$dates = array(
    array('mon' => 12, 'mday' => 25, 'year' => 2001),
    array('mon' => 5, 'mday' => 23, 'year' => 2000),
    array('mon' => 10, 'mday' => 29, 'year' => 2001)
);

// Include format from external file
$format = include("local_format.php");

// Iterate over the dates and print each one with swapped arguments
foreach ($dates as $date) {
    printf($format, $date['mon'], $date['mday'], $date['year']);
}
?>