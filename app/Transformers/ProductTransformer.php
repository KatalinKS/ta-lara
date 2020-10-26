<?php

namespace App\Transformers;

use App\Repositories\ProductLocaleRepository;
use Illuminate\Support\Facades\App;
use League\Fractal\TransformerAbstract;
use App\Entities\Product;

/**
 * Class ProductTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProductTransformer extends TransformerAbstract
{
    private $locale;

    public function __construct()
    {
        $this->locale = resolve('App\Repositories\ProductLocaleRepository');
    }

    /**
     * Transform the Product entity.
     *
     * @param \App\Entities\Product $model
     *
     * @return array
     */
    public function transform(Product $model)
    {
        $locale = $this->locale->findWhere(['product_id' => $model->id, 'locale' => App::getLocale()]);
        return [
            'id'                => (int) $model->id,
            'sku'               => $model->sku,
            'name'              => $locale[0]->name,
            'description'       => $locale[0]->description,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
