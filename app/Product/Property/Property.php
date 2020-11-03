<?php


namespace App\Product\Property;


use App\Product\Property\Classes\PropertyCollector;

class Property
{
    private $propertyCollector;

    public function __construct()
    {
        $this->propertyCollector = new PropertyCollector();
    }

    public function getProductProperties(int $productId)  {
        return $this->propertyCollector->collectByProductId($productId);
    }
}
