<?php
// Set the current working directory
$directory = getcwd() . "/1_basicphp/";

// Returns array of files, excluding '.' and '..'
$files = array_diff(scandir($directory), array('.', '..'));

// Count number of files and store them to variable
$num_files = count($files);

// Debugging: To see the number of valid files in the directory
echo $num_files . " files found.";
?>