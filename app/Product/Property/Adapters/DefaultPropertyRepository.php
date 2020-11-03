<?php


namespace App\Product\Property\Adapters;


use App\Product\Property\Intefaces\Repository;
use Illuminate\Database\Eloquent\Collection;

class DefaultPropertyRepository implements Repository
{
    private $repository;

    public function __construct()
    {
        $this->repository = resolve(\App\Repositories\PropertyRepository::class);
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
