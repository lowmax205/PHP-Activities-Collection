<?php
$test = false;
if ($test) {
    include("a_file.txt"); // Won't be included if $test is false
}
