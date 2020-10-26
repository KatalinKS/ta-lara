<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\product_localeRepository;
use App\Models\ProductLocale;
use App\Validators\ProductLocaleValidator;

/**
 * Class ProductLocaleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductLocaleRepositoryEloquent extends BaseRepository implements ProductLocaleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductLocale::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return ProductLocaleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
