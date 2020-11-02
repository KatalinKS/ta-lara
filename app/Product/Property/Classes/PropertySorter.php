<?php


namespace App\Product\Property\Classes;


use Illuminate\Database\Eloquent\Collection;

class PropertySorter
{
    public static function sortById(Collection $collection): array {
        $tmp = [];
        foreach ($collection as $element) {
            $tmp[$element->id] = $element;
        }
        return $tmp;
    }
}
