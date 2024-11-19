<?php
abstract class AbstractShop
{
    private static $instance;
    public $name = "shop";

    // Static method to return the single instance
    public static function getInstance()
    {
        if (empty(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
}

class Shop extends AbstractShop
{
    // Additional functionality for Shop can be added here
}

$first = Shop::getInstance();
$first->name = "Acme Shopping Emporium";
$second = Shop::getInstance();

print $second->name; // Output: Acme Shopping Emporium
