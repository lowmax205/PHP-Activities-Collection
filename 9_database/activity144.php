<?php
$res = mysql_query("SELECT * FROM users", $link);
echo mysql_field_name($res, 0) . "\n"; // Example: user_id
echo mysql_field_name($res, 1);        // Example: password
?>
