<?php

namespace Product\Property\Classes;

use App\Product\Property\Classes\ValueSorter;
use App\Product\Property\Objects\Value;
use PHPUnit\Framework\TestCase;

class ValueSorterTest extends TestCase
{
    public function dataForSortByProperty() {
        $factory = Value::factory();
        return [
            '1 Value object' => [$factory->generate(1)],
            '10 Value object' => [$factory->generate(10)],
        ];
    }
    /**
     * @dataProvider dataForSortByProperty
     * @param $values
     */
    public function testCheckCountElements($values) {
        $countElements = 0;
        $sortedValues = ValueSorter::sortByProperty($values);
        foreach ($sortedValues as $valuesInCategory) {
            $countElements += count($valuesInCategory);
        }
        $this->assertEquals(count($values), $countElements);
    }
    /**
     * @dataProvider dataForSortByProperty
     * @param $values
     */
    public function testSortByProperty($values)
    {
        $sortedValues = ValueSorter::sortByProperty($values);
        foreach ($sortedValues as $key => $valuesInCategory) {
            foreach ($valuesInCategory as $value) {
                $this->assertEquals($value->propertyId, $key);
            }
        }

    }
}
