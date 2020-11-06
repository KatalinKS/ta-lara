<?php

namespace Product\Property\Classes;

use App\Product\Property\Classes\PropertySorter;
use App\Product\Property\Objects\Property;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\CodeUnit\FunctionUnit;

class PropertySorterTest extends TestCase
{
    public function dataSortById() {
        $factory = Property::factory();
        return [
            '1 Property object' => [$factory->generate(1)],
            '10 Property object' => [$factory->generate(10)],
        ];
    }

    /**
     * @dataProvider dataSortById
     * @param Property[] $properties
     */
    public function testSortById($properties) {
        $sortedProperty = PropertySorter::sortById($properties);
        foreach ($sortedProperty as $key => $property) {
            $this->assertEquals($key, $property->id);
        }
    }
}
