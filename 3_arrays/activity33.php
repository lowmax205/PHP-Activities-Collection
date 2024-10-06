<?php
$users = array(
	array("hi", "Marry"),
	array("hello", "There"),
	array("Therre", "Monale")
);

foreach ($users as $val) {
	foreach ($val as $key => $content) {
		print "$key: $content<br>";
	}
}
?>