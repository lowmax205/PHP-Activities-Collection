<?php
class Item
{
    var $name = "item"; // Property declaration
}

$obj1 = new Item();
$obj2 = new Item();

$obj1->name = "widget 5442";
print "$obj1->name<br />"; // Output: widget 5442
print "$obj2->name<br />"; // Output: item
