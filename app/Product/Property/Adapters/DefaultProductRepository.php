<?php


namespace App\Product\Property\Adapters;


use App\Product\Property\Intefaces\Repository;
use Illuminate\Database\Eloquent\Collection;

class DefaultValueRepository implements Repository
{
    public $repository;

    public function __construct()
    {
        $this->repository = resolve();
    }

    public function findWhere(array $filter): Collection
    {
        // TODO: Implement findWhere() method.
    }

    public function findWhereIn(string $row, array $values): Collection
    {
        // TODO: Implement findWhereIn() method.
    }
}
