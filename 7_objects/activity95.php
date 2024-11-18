<?php
class Item
{
   public $name = "item";
   public $price = 0;
   function __call($method, $args)
   {
      $bloggsfuncs = array("bloggsRegister", "bloggsRemove");
      if (in_array($method, $bloggsfuncs)) {
         array_unshift($args, get_object_vars($this));
         return call_user_func($method, $args);
      }
   }
}
$item = new Item();
print $item->bloggsRegister(true);
print $item->bloggsRemove(true);
