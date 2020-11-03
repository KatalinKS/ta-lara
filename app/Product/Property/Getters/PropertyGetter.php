<?php


namespace App\Product\Property\Getters;

use App\Product\Property\Adapters\DefaultPropertyRepository;

class PropertyGetter extends Getter
{
    public function getValuesBySeveralIds(array $id): array {
        return $this->repository->findWhereIn('id', $id);
    }
}
