<?php
class Item
{
    private $id = 555;
    final function getID()
    {
        return $this->id;
    }
}
class PriceItem extends Item
{
    function getID()
    {
        return 0;
    }
}
