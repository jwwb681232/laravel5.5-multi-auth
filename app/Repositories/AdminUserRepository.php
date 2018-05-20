<?php

namespace App\Repositories;

use App\Criteria\AdminUserCriteria;
use Illuminate\Http\Request;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Admin;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AdminUserRepository extends BaseRepository
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
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function search(Request $request)
    {
        //$condition = $this->model;
        $condition = $this->pushCriteria(AdminUserCriteria::class);

        $data['data'] = $this->parserResult(
            $condition->offset($request->get('offset'))->limit($request->get('limit'))->get()
        );

        $data['total'] = $condition->count();

        return $data;
    }

}
