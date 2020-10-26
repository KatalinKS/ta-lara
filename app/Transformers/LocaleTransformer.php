<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Locale;

/**
 * Class LocaleTransformer.
 *
 * @package namespace App\Transformers;
 */
class LocaleTransformer extends TransformerAbstract
{
    /**
     * Transform the Locale entity.
     *
     * @param \App\Models\Locale $model
     *
     * @return array
     */
    public function transform(Locale $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
