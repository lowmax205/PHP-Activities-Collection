<?php
class Product {
    public $name;      // Public property
    private $code;     // Private property
    protected $type;   // Protected property

    function __construct($name, $code, $type) {
        $this->name = $name;
        $this->code = $code;
        $this->type = $type;
    }

    public function getProductInfo() {
        return "Name: $this->name, Type: $this->type"; 
    }
}
?>