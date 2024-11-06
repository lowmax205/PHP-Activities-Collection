<?php
$result = mysql_query("SELECT name, address FROM people WHERE id = '42'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
echo mysql_num_fields($result);
?>
