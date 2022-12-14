<?php
require_once __DIR__ . "/Product.php";

class Toy extends Product
{
    public $tipo_materiale;

    function __construct($_image, $_name, $_description, $_price, $_tipo_materiale)
    {
        parent::__construct($_image, $_name, $_description, $_price);
        $this->tipo_materiale = $_tipo_materiale;
    }

    public function getMateriale()
    {
        return $this->tipo_materiale;
    }
}
