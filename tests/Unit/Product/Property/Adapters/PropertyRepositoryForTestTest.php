<?php

namespace Product\Property\Adapters;

use App\Product\Property\Adapters\PropertyRepositoryForTest;
use App\Product\Property\Objects\Property;
use PHPUnit\Framework\TestCase;

class PropertyRepositoryForTestTest extends TestCase
{
    private PropertyRepositoryForTest $repository;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub\
        $this->repository = new PropertyRepositoryForTest();
    }

    public function testFindWhereIn()
    {
        $properties = $this->repository->findWhereIn('typeId' , [10, 12, 13]);
        foreach ($properties as $property) {
            $this->assertInstanceOf(Property::class, $property, 'Проверка соответствия типа');
            $this->assertContainsEquals([10, 12, 13], $property->typeId, 'Проверка соответствия типа значения');
        }

    }

    public function testFindWhere()
    {

    }
}
