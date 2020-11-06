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

    public function dataForFindWhereIn() {
        return [
            'поиск с вхождением в 1 элемент не уникальный' => ['typeId', [10, 12, 13]]
        ];
    }
    /**
     * @dataProvider dataForFindWhereIn
     */
    public function testFindWhereIn($row, $filterData)
    {
        $properties = $this->repository->findWhereIn($row , $filterData);
        foreach ($properties as $property) {
            $this->assertInstanceOf(Property::class, $property, 'Проверка соответствия типа');
            $this->assertContainsEquals($property->$row, $filterData,  'Проверка соответствия типа значения');
        }

    }

    public function testFindWhere()
    {

    }
}
