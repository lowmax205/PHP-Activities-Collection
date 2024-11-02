<?php
$fp = fopen("test.txt", "w");
$fp = fopen("test.txt", "a");

fwrite($fp, "hello world");
fputs($fp, "hello world");
