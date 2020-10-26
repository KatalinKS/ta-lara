<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\localeRepository;
use App\Models\Locale;
use App\Validators\LocaleValidator;

/**
 * Class LocaleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class LocaleRepositoryEloquent extends BaseRepository implements LocaleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Locale::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return LocaleValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
