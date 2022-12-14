<?php
require_once __DIR__ . "/Product.php";

class Food extends Product
{
    private String $data_scadenza;

    function __construct($_image, $_name, $_description, $_price, $_data_scadenza)
    {
        parent::__construct($_image, $_name, $_description, $_price);
        $this->data_scadenza = $_data_scadenza;
    }

    public function getScadenza()
    {
        return $this->data_scadenza;
    }
}
