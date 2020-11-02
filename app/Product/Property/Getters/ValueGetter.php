<?php


namespace App\Product\Property\Getters;


use App\Product\Property\Adapters\DefaultValueRepository;
use Illuminate\Database\Eloquent\Collection;

class ValueGetter extends Getter
{
    public function __construct()
    {
        $repository = new DefaultValueRepository();
        parent::__construct($repository);
    }

    public function getValuesBySeveralIds(array $id): array {
        return $this->repository->findWhereIn('id', $id);
    }
}
