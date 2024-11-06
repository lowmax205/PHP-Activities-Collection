<?php
$db_selected = mysql_select_db("test_db", $con);
if (!$db_selected) {
    die("Can't use test_db : " . mysql_error());
}
?>
