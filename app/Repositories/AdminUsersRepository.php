<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;
use App\Admin;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdminUsersRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Admin::class;
    }

    /**
     * Boot up the repository, pushing criteria
     *
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    /*public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }*/

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
