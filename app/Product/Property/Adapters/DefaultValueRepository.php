<?php


namespace App\Product\Property\Adapters;


use App\Product\Property\Intefaces\Repository;
use Prettus\Repository\Eloquent\BaseRepository;

abstract class DefaultRepository implements Repository
{
    private $repository;

    public function __construct()
    {
        $this->repository = resolve('HelpSpot\API');
    }
}
