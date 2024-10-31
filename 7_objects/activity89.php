<?php
class Item {
    var $name;
    var $code; // Add the code property

    // Constructor to initialize name and code
    function __construct($name = "item", $code = 0) {
        $this->name = $name;
        $this->code = $code;
    }

    function getName() {
        return $this->name;
    }
}

// PriceItem extends Item, inheriting its properties and methods
class PriceItem extends Item {
    
}

// Instantiate PriceItem with name and code
$item = new PriceItem("widget", 5442);
print $item->getName(); // Output: widget
?>
