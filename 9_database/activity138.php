<?php
mysql_query("DELETE FROM mytable WHERE id < 10");
printf("Records deleted: %d\n", mysql_affected_rows());

mysql_query("DELETE FROM mytable WHERE 0");
printf("Records deleted: %d\n", mysql_affected_rows());
?>
