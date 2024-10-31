<?php
class Shop
{
    private static $instance;
    public $name = "shop";

    // Static method to return the single instance
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new Shop();
        }
        return self::$instance;
    }
}

$first = Shop::getInstance();
$first->name = "Acme Shopping Emporium";
$second = Shop::getInstance();

print $second->name; // Output: Acme Shopping Emporium
