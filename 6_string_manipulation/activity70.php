<?php
setLocale(LC_ALL, 'en_US');
$cash_array = array(235.31, 5, 2000000.45);

foreach ($cash_array as $cash) {
    echo money_format("%n", $cash);  // Output: $235.31, $5.00, $2,000,000.45
}
?>