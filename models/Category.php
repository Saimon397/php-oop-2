<?php

class Category
{
    private String $species;
    private string $icon;

    function __construct(String $_species, string $_icon)
    {
        $this->species = $_species;
        $this->icon = $_icon;
    }

    public function getSpecies()
    {
        return $this->species;
    }

    public function getIcon()
    {
        return $this->icon;
    }
}
