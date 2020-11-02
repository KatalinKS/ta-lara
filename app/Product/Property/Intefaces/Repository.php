<?php


namespace App\Product\Property\Intefaces;


use Illuminate\Database\Eloquent\Collection;

interface Repository
{
    public function findWhere(array $filter): Collection;
    public function findWhereIn(String $row, array $values): Collection;
}
