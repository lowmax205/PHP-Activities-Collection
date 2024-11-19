<?php
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
