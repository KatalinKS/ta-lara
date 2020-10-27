<?php

namespace App\Presenters;

use App\Traits\Repository\PresenterTrait;
use App\Transformers\ProductTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProductPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProductPresenter extends FractalPresenter
{
    use PresenterTrait;
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProductTransformer();
    }

}
