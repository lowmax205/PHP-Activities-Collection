<?php
class Item {
    var $name;

    // Constructor to initialize the name
    function Item($name = "item") {
        $this->name = $name;
    }

    function setName($n) {
        $this->name = $n;
    }

    function getName() {
        return $this->name;
    }
}

$item = new Item("widget 5442");
print $item->getName(); // Output: widget 5442
?>