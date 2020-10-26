<?php

namespace App\Presenters;

use App\Transformers\LocaleTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class LocalePresenter.
 *
 * @package namespace App\Presenters;
 */
class LocalePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new LocaleTransformer();
    }
}
