<?php


namespace App\Product\Property\Classes;


use App\Product\Property\Objects\Value;

class ValueSorter
{
    /**
     * Сортирует массив с Value по propertyId, в роли ключа массива выступает propertyId
     * @param Value[] $values
     * @return Value[]
     */
    public static function sortByProperty(array $values): array {
        $tmp = [];
        foreach ($values as $value) {
            if (TypeChecker::isTypeValue($value)) {
                $tmp[$value->propertyId][] = $value;
            }
        }
        return $tmp;
    }


}
