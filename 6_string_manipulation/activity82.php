<?php
setlocale(LC_ALL, 'en_US.UTF-8'); // Use the correct locale format
$cash_array = array(235.31, 5, 2000000.45);

foreach ($cash_array as $cash) {
    echo '$' . number_format($cash, 2) . "\n"; // Format as currency
}
