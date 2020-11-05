<?php


namespace App\Product\Property\Objects;


use App\Factory\Traits\UseFactory;

class Value
{
    use UseFactory;

    public $id;
    public $value;
    public $description;
    public $propertyId;
    public $typeId;
    public $sort;

}
