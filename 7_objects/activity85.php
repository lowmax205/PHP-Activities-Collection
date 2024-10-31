<?php
class Item
{
    var $name = "item"; // Property

    // Method to return the name of the item
    function getName()
    {
        return "item";
    }
}

$item = new Item();
print $item->getName(); // Output: item
