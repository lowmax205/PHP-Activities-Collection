<?php
// Insert
mysql_query("INSERT INTO mytable (product) VALUES ('kossu')");

// Select
$result = mysql_query("SELECT * FROM mytable");
while ($row = mysql_fetch_assoc($result)) {
    print_r($row);
}

// Update
mysql_query("UPDATE mytable SET product='new_product' WHERE id=1");

// Delete
mysql_query("DELETE FROM mytable WHERE id=1");
?>
