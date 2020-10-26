<?php

namespace App\Transformers;

use App\Repositories\ProductLocaleRepository;
use League\Fractal\TransformerAbstract;
use App\Models\ProductLocale;

/**
 * Class ProductLocaleTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductLocaleTransformer extends TransformerAbstract
{
    /**
     * Transform the ProductLocale entity.
     *
     * @param \App\Models\ProductLocale $model
     *
     * @return array
     */
    public function transform(ProductLocale $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
