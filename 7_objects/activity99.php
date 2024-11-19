<?php
class ItemUpdater
{
    public function update(Item $item)
    {
        print "updating.. ";
        print $item->name;
    }
}
class Item
{
    public $name = "item";
    private $updater;
    public function setUpdater(ItemUpdater $update)
    {
        $this->updater = $update;
    }
    function __destruct()
    {
        if (! empty($this->updater)) {
            $this->updater->update($this);
        }
    }
}
$item = new Item();
$item->setUpdater(new ItemUpdater());
unset($item);
