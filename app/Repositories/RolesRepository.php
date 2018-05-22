<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\Role;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RolesRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class RolesRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }

    /**
     * Boot up the repository, pushing criteria
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function search(Request $request)
    {
        $this->applyCriteria();
        $condition = $this->model;

        $data['total'] = $condition->count();

        $data['data'] = $this->parserResult(
            $condition->offset($request->get('offset',0))->limit($request->get('limit',$data['total']))->get()
        );


        return $data;
    }
    
}
