<?php
class Item {
    public static $SALES_TAX = 9; // Static property

    // Static method to access static property
    public static function getSalesTax() {
        return self::$SALES_TAX;
    }
}

print "The tax to be levied on all items is " . Item::$SALES_TAX . "%"; // Output: 9%
?>