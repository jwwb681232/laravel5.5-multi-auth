<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\MyRepository;
use App\Entities\My;
use App\Validators\MyValidator;

/**
 * Class MyRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class MyRepositoryEloquent extends BaseRepository implements MyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return My::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return MyValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
