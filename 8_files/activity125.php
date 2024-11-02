<?php
$contents = file_get_contents("test.txt");
$file_array = file("test.txt");
$contents = implode($file_array);
