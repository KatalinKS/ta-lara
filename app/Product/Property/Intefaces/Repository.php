<?php


namespace App\Product\Property\Intefaces;

interface Repository
{
    public function findWhere(array $filter): array;
    public function findWhereIn(String $row, array $values): array;
}
