<?php


namespace App\Product\Property\Adapters;


use App\Product\Property\Intefaces\Repository;
use App\Product\Property\Objects\Property;

class PropertyRepositoryForTest implements Repository
{

    public function findWhere(array $filter): array
    {
        return Property::factory()->generate(rand(1,10));
    }

    public function findWhereIn(string $row, array $values): array
    {
        $criteria = [$row => $values];
        return Property::factory()
            ->addCriteria($criteria)
            ->generate(rand(1,10));
    }
}
