<?php


namespace App\Product\Property\Adapters;


use Illuminate\Database\Eloquent\Collection;

class PropertyRepositoryForTest implements \App\Product\Property\Intefaces\Repository
{

    public function findWhere(array $filter): Collection
    {
        // TODO: Implement findWhere() method.
    }

    public function findWhereIn(string $row, array $values): Collection
    {
        // TODO: Implement findWhereIn() method.
    }
}
