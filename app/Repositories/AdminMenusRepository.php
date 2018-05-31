<?php
/**
 * Created by PhpStorm.
 * User: wangxiao
 * Date: 2018/5/30
 * Time: 17:44
 */

namespace App\Repositories;

use App\Criteria\AdminMenus\TopMenusCriteria;
use App\Criteria\Permissions\TopPermissionCriteria;
use App\Criteria\Permissions\TopPermissionsCriteria;
use App\Entities\AdminMenu;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

class AdminMenusRepository extends BaseRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return AdminMenu::class;
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

    public function otherRepository(BaseRepository $repository)
    {
        return (new $repository($this->app));
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function children()
    {
        return AdminMenu::with(['children', 'permission'])->where('parent_id', 0)->get();
    }

    /**
     * @return array
     */
    public function viewDataForCreate()
    {
        $permissionRepository = (new PermissionsRepository($this->app));
        $this->pushCriteria(TopMenusCriteria::class);
        $permissionRepository->pushCriteria(TopPermissionsCriteria::class);

        $topMenus       = $this->all(['id', 'name']);
        $topPermissions = $permissionRepository->all(['id', 'name']);

        return compact('topMenus', 'topPermissions');
    }
}