<?php

namespace App\Transformers;

use App\Repositories\ProductLocaleRepository;
use Illuminate\Support\Facades\App;
use League\Fractal\TransformerAbstract;
use App\Classes\Product;
use App\Entities\Product as ProductModel;

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
    public function transform(ProductModel $model)
    {
        $locale = $this->locale->findWhere(['product_id' => $model->id, 'locale' => App::getLocale()]);

        $product = new Product();
        $product->id = (int) $model->id;
        $product->sku = $model->sku;
        $product->name = $locale[0]->name;
        $product->description = $locale[0]->description;

        return $product;
    }
}
