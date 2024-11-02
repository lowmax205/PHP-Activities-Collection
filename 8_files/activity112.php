<?php
// php.ini setting:
// include_path=".:/home/mary/php_lib:/usr/local/lib/php"

// .htaccess setting:
// php_value include_path /home/mary/php_lib

ini_set("include_path", "/home/mary/php_lib");
set_include_path("/home/mary/php_lib");
