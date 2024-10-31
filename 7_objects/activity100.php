<?php
class Item {
    var $name;

    // Constructor to initialize name and code
    function Item($name = "item", $code = 0) {
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

$item = new PriceItem("widget", 5442);
print $item->getName(); // Output: widget
?>