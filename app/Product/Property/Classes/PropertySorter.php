<?php


namespace App\Product\Property\Classes;


use Illuminate\Database\Eloquent\Collection;

class PropertySorter
{
    public static function sortById(array $properties): array {
        $tmp = [];
        foreach ($properties as $element) {
            $tmp[$element->id] = $element;
        }
        return $tmp;
    }
}
