<?php
$result = mysql_query("SELECT id, email FROM people WHERE id = '42'");
$length = mysql_field_len($result, 0);
echo $length;
?>
