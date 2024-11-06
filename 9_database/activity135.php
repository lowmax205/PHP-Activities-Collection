<?php
// Turn off all error reporting
error_reporting(0);

// Report simple running errors
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Report all errors except E_NOTICE
error_reporting(E_ALL ^ E_NOTICE);
?>
