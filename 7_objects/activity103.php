<?php
class Item {
    public static $SALES_TAX = 10; // Static property

    // Static method to calculate tax
    public static function calcTax($amount) {
        return $amount + ($amount / (Item::$SALES_TAX / 100));
    }
}

$amount = 10;
print "Given a cost of $amount, the total will be " . Item::calcTax($amount); // Output: 11
?>