<?php
class Item {
    var $name = "item"; // Property

    // Method to access the property
    function getName() {
        return $this->name; // Accessing property using $this
    }
}

$item = new Item();
$item->name = "widget 5442"; // Modify the property
print $item->getName(); // Output: widget 5442
?>