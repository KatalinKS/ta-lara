<?php


namespace App\Traits\Repository;


use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Pagination\AbstractPaginator;

trait PresenterTrait
{
    public function present($data):array
    {
        if (!class_exists('League\Fractal\Manager')) {
            throw new Exception(trans('repository::packages.league_fractal_required'));
        }

        if ($data instanceof EloquentCollection) {
            $tmp = [];
            foreach ($data as $element) {
                $tmp[] = $this->getTransformer()->transform($element);
            }
        } elseif ($data instanceof AbstractPaginator) {
            $tmp = [];
            foreach ($data as $element) {
                $tmp[] = $this->getTransformer()->transform($element);
            }
        } else {
            $tmp[] = $this->getTransformer()->transform($data);
        }
        return $tmp;
    }
}
