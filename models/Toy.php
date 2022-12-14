<?php
include_once __DIR__ . '/Product.php';
class Game extends Product{
    private String $size;
    private Array $material;

    function __construct(String $_title, String $_image, Float $_price, Category $_category,String $_size, Array $_material)
    {
        parent::__construct($_title, $_image, $_price, $_category);
        $this->setsize($_size);
        $this->setmaterial($_material);
    }

    public function getsize()
    {
        return $this->size;
    }

    public function setsize($size)
    {
        if(strlen($size)){
            $this->size = $size;
        }else{
            $this->size = "Piccolo";
        }
        return $this;
    }
    public function getmaterial()
    {
        return $this->material;
    }
    public function setmaterial($material)
    {
        if(count($material)){
            $this->material = $material;
        }else{
            $this->material = ["Unknown"];
        }
        return $this;
    }
}
