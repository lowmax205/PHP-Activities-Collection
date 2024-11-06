<?php
mysql_connect("localhost", "mysql_user", "mysql_password") or die("Could not connect: " . mysql_error());
mysql_select_db("mydb");

$result = mysql_query("SELECT id, name FROM mytable");
while ($row = mysql_fetch_array($result, MYSQL_BOTH)) {
    printf("ID: %s Name: %s", $row[0], $row["name"]);
}
mysql_free_result($result);
?>
