<?php

namespace App\Presenters;

use App\Transformers\ProductLocaleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductLocalePresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductLocalePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductLocaleTransformer();
    }
}
