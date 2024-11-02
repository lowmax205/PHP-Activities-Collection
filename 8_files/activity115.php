<?php
if (is_readable("test.txt")) {
    print "test.txt is readable";
}
if (is_writable("test.txt")) {
    print "test.txt is writable";
}
if (is_executable("test.txt")) {
    print "test.txt is executable";
}
