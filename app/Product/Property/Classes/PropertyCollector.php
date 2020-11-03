<?php


namespace App\Product\Property\Classes;


use App\Product\Property\Getters\BindingValueToProductGetter;
use App\Product\Property\Getters\PropertyGetter;
use App\Product\Property\Getters\ValueGetter;
use App\Product\Property\Objects\Model\Property as PropertyModel;
use App\Product\Property\Objects\Value;
use App\Product\Property\Objects\Property;

class PropertyCollector
{
    /**
     * @var PropertyGetter
     */
    private $propertyGetter;
    /**
     * @var ValueGetter
     */
    private $valueGetter;
    /**
     * @var BindingValueToProductGetter
     */
    private $bidingValueToProductGetter;

    /**
     * PropertyCollector constructor.
     * @param BindingValueToProductGetter $bidingValueToProductGetter
     * @param ValueGetter $valueGetter
     * @param PropertyGetter $propertyGetter
     */
    public function __construct(BindingValueToProductGetter $bidingValueToProductGetter, ValueGetter $valueGetter, PropertyGetter $propertyGetter)
    {
        $this->bidingValueToProductGetter = $bidingValueToProductGetter;
        $this->propertyGetter = $propertyGetter;
        $this->valueGetter = $valueGetter;
    }

    /**
     * Получить id привязанных к продукту значений по id продукта
     * @param int $productId
     * @return array
     */
    private function getBindingValuesId(int $productId):array {
        return $this->bidingValueToProductGetter->getByProductId($productId);
    }

    /**
     * Получить Value привязанных к продукту значений по id продукта
     * @param int $productId
     * @return Value[]
     */
    private function getBindingValues(int $productId):array {
        $valuesId = $this->getBindingValuesId($productId);
        return $this->valueGetter->getValuesBySeveralIds($valuesId);
    }

    /**
     * получить Properties по id
     * @param int $propertiesId
     * @return Property[]
     */
    private function getPropertiesByPropertiesId(int $propertiesId):array {
        return $this->propertyGetter->getValuesBySeveralIds($propertiesId);
    }

    /**
     * Получить Property модель для модели Values
     * @param Value[] $values
     * @return Property[]
     */
    public function getPropertiesForValues(array $values):array {
        $propertiesId = [];
        foreach($values as $value) {
            $propertiesId[] = $value->propertyId;
        }
        return $this->getPropertiesByPropertiesId($propertiesId);
    }
    /**
     * Получить сборку Property для продукта по id продукта
     * @param int $productId
     * @return Property[]
     */
    public function collectByProductId(int $productId):array {
        $values = $this->getBindingValues($productId);
        $properties = $this->getPropertiesForValues($values);
        return $this->collectArray($properties, $values);



    }

    /**
     * Собирает из массивов Property и Values полный обьект Property
     * @param Property[] $properties
     * @param Value[] $values
     * @return Property[]
     */
    private function collectArray(array $properties, array $values):array {
        $values = ValueSorter::sortByProperty($values);
        $tmp = [];
        foreach ($properties as $property) {
            $tmp[] = $this->collect($property, $values[$property->id]);
        }
        return  $tmp;
    }

    /**
     * Собирает полный обьект Property из Property и Value
     * @param Property $property
     * @param Value $value
     * @return Property
     */
    private function  collect(Property $property, Value $value): Property {
        $property->value[] = $value;
        return $property;
    }
}
