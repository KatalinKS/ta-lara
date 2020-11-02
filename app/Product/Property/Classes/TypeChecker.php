<?php


namespace App\Product\Property\Classes;


use App\Product\Property\Objects\Value;

class TypeChecker
{
    /**
     * Проверяет соответствует ли входное значение классу Value
     * @param $value
     * @return bool
     */
    public static function isTypeValue($value) {
        if($value instanceof Value) {
            return true;
        } else {
            return false;
        }
    }
}
