<?php


namespace App\Product\Property\Getters;


class PropertyGetter extends Getter
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
