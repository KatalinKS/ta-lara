<?php


namespace App\Product\Property\Getters;


use App\Product\Property\Adapters\DefaultValueRepository;
use App\Product\Property\Intefaces\Repository;

abstract class Getter
{
    /**
     * @var Repository
     */
    public $repository;

    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    public function setRepository(Repository $repository) {
        $this->repository = $repository;
    }
}
