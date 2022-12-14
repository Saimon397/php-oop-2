<?php
require_once __DIR__ . "/Product.php";

class Accessory extends Product
{
    public $marca;

    function __construct($_image, $_name, $_description, $_price, $_marca)
    {
        parent::__construct($_image, $_name, $_description, $_price);
        $this->marca = $_marca;
    }

    public function getMarca()
    {
        return $this->marca;
    }
}
