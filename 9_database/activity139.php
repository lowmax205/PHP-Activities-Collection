<?php
mysql_query("INSERT INTO mytable (product) VALUES ('kossu')");
printf("Last inserted record has id %d\n", mysql_insert_id());
?>
