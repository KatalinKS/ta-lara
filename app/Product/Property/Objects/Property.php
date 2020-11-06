<?php


namespace App\Product\Property\Objects;


use App\Factory\Traits\UseFactory;

/**
 * Class Property
 * @package App\Product\Property\Objects
 */
class Property
{
    use UseFactory;
    /**
     * @var
     */
    public $id;
    /**
     * @var
     */
    public $name;
    /**
     * @var Value
     */
    public $value;
    /**
     * @var
     */
    public $typeId;
    /**
     * @var
     */
    public $typeOfChoiceId;
}
