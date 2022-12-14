<?php
include_once __DIR__ . '/Category.php';
class Product
{
    protected String $image;
    protected String $name;
    protected String $description;
    protected Float $price;

    function __construct($_image, $_name, $_description, $_price,)
    {
        $this->image = $_image;
        $this->name = $_name;
        $this->description = $_description;
        $this->price = $_price;
    }

    public function getName()
    {
        return $this->name;
    }
    public function getImage()
    {
        return $this->image;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function getDescription()
    {
        return $this->description;
    }
}
