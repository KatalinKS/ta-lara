<?php

namespace Factory;

use App\Product\Property\Objects\Value;
use PHPUnit\Framework\TestCase;

class FactoryTest extends TestCase
{

    public function DataForCreatObject() {
        return
            [
                'Create Value' => [Value::class],
            ];
    }
    function DataForCreatNObject() {
        return
            [
                'Create 0 Value' => [Value::class, 0],
                'Create 1 Value' => [Value::class, 1],
                'Create 10 Value' => [Value::class, 10],
            ];
    }

    /**
     * @dataProvider DataForCreatObject
     * @param $className
     */
    public function testCreateObject($className)
    {
        $factory = $className::factory();
        $objectsList = $factory->generate();
        $obj = $objectsList[0];
        $this->assertInstanceOf($className, $obj);
    }

    /**
     * @dataProvider DataForCreatNObject
     * @param $className
     */
    public function testCreateNObject($className, $n)
    {
        $factory = $className::factory();
        $objectsList = $factory->generate($n);
        $this->assertCount($n, $objectsList);
    }

}
