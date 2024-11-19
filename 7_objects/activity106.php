<?php
class PassObj
{
    function PassObj($item)
    {
        $item->name = "harry";
    }
}
class Item
{
    var $name = "bob";
}
$item = new Item();
$pass = new PassObj($item);
print $item->name;
///////////////////////////////////////////////////
function &addItem(&$item)
{
    $this->items[] = &$item;
    return $item;
}
