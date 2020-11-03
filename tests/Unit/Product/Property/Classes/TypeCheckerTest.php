<?php

namespace Product\Property\Classes;

use App\Product\Property\Classes\TypeChecker;
use App\Product\Property\Objects\Property;
use App\Product\Property\Objects\Value;
use PHPUnit\Framework\TestCase;

class TypeCheckerTest extends TestCase
{
    public function dataForTestIsTypeValue() {
        $data1 = new Value();
        $data2 = new Property();
        return [
            'Value' => [$data1, true],
            'Not Value' => [$data2, false],
            'null' => [null, false]
        ];
    }

    /**
     * @dataProvider dataForTestIsTypeValue
     * @param $d
     * @param $r
     */
    public function testIsTypeValue($d, $r)
    {
        $this->assertEquals(TypeChecker::isTypeValue($d), $r);
    }
}
